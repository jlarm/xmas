<?php

use App\Livewire\CreateItem;
use App\Livewire\ItemForm;
use App\Models\Item;
use App\Models\Kid;

beforeEach(function () {
    $this->kid = Kid::factory()->create();
});

it('can initialize with a kid id', function () {
    Livewire::test(ItemForm::class, ['kid' => $this->kid])
        ->assertSet('kid', $this->kid);
});

it('shows auth modal if not authenticated', function () {
    Livewire::test(ItemForm::class, ['kid' => $this->kid])
        ->set('isAuthenticated', false)
        ->assertSet('showAuthModal', true);
});

it('can see add item', function () {
    $this->get(route('form', $this->kid))
        ->assertSeeLivewire(CreateItem::class);
});

it('can create new item', function () {
    Livewire::test(CreateItem::class, ['kid' => $this->kid])
        ->set('name', 'Test Item')
        ->call('addItem');

    $this->assertEquals(1, Item::all()->count());
});

it('has error if name not entered', function () {
    Livewire::test(CreateItem::class, ['kid' => $this->kid])
        ->set('name', '')
        ->call('addItem')
        ->assertHasErrors('name');
});

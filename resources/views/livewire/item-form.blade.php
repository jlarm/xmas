<div>
    <div class="mb-5 text-center">
        <flux:heading size="lg">{{ $kid->name }}</flux:heading>
        <flux:subheading>Add an item to your list.</flux:subheading>
    </div>
    <livewire:create-item :$kid hidePurchased="true" />
</div>

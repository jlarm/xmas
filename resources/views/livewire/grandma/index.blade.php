<div>
    <div class="mb-10 flex justify-center">
        <flux:navbar>
            <flux:navbar.item wire:navigate href="?kid=1" :current="$kid == 1">Kailee</flux:navbar.item>
            <flux:navbar.item wire:navigate href="?kid=2" :current="$kid == 2">Becca</flux:navbar.item>
            <flux:navbar.item wire:navigate href="?kid=3" :current="$kid == 3">Alissa</flux:navbar.item>
            <flux:navbar.item wire:navigate href="?kid=4" :current="$kid == 4">Jacob</flux:navbar.item>
        </flux:navbar>
    </div>

    <flux:table :paginate="$this->items">
        <flux:columns>
            <flux:column sortable :sorted="$sortBy === 'name'" :direction="$sortDirection" wire:click="sort('name')">
                Name
            </flux:column>
            <flux:column sortable :sorted="$sortBy === 'store'" :direction="$sortDirection" wire:click="sort('store')">
                Store
            </flux:column>
            <flux:column
                sortable
                :sorted="$sortBy === 'purchased'"
                :direction="$sortDirection"
                wire:click="sort('purchased')"
            >
                Purchased
            </flux:column>
            <flux:column>Amount</flux:column>
        </flux:columns>

        <flux:rows>
            @foreach ($this->items as $item)
                <livewire:grandma.index-item :$item :key="$item->id" />
            @endforeach
        </flux:rows>
    </flux:table>
</div>

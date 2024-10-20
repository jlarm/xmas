<div>
    <form wire:submit.prevent="addItem" class="space-y-5">
        <flux:field>
            <flux:label badge="Required">Name</flux:label>

            <flux:input wire:model="name" type="text" required />

            <flux:error name="name" />
        </flux:field>

        <flux:field>
            <flux:label>Store Name</flux:label>

            <flux:input wire:model="store" type="text" />

            <flux:error name="store" />
        </flux:field>

        <flux:field>
            <flux:label>Size</flux:label>

            <flux:input wire:model="size" type="text" />

            <flux:error name="size" />
        </flux:field>

        <flux:field>
            <flux:label>Color</flux:label>

            <flux:input wire:model="color" type="text" />

            <flux:error name="color" />
        </flux:field>

        <flux:field>
            <flux:label>Price</flux:label>

            <flux:input wire:model="price" type="text" placeholder="99.99" />

            <flux:error name="price" />
        </flux:field>

        <flux:field>
            <flux:label>Link</flux:label>

            <flux:input wire:model="link" type="url" placeholder="https://google.com" />

            <flux:error name="link" />
        </flux:field>
        @if (! $hidePurchased)
            <flux:checkbox wire:model="purchased" label="Already Purchased" />
        @endif

        <flux:button type="submit" variant="primary">Add Item</flux:button>
    </form>
</div>

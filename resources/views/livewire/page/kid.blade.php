<div class="mx-auto max-w-4xl p-5">
    <flux:heading size="xl">{{ $kid->name }}</flux:heading>
    <livewire:stats :$kid />
    <div>
        <flux:tab.group>
            <flux:tabs variant="segmented">
                <flux:tab name="list">List</flux:tab>
                <flux:tab name="purchased">Purchased</flux:tab>
                <flux:tab name="add">Add Item</flux:tab>
            </flux:tabs>
            <flux:tab.panel name="list">
                <livewire:item-index :$kid />
            </flux:tab.panel>
            <flux:tab.panel name="purchased">
                <livewire:purchased :$kid />
            </flux:tab.panel>
            <flux:tab.panel name="add">
                <livewire:create-item :$kid />
            </flux:tab.panel>
        </flux:tab.group>
    </div>
</div>

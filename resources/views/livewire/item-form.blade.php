<div>
    <flux:heading size="lg" class="mb-3 text-center">{{ $kid->name }}</flux:heading>
    <flux:tab.group>
        <div class="m-auto flex max-w-full justify-center max-lg:min-w-fit lg:max-w-96">
            <flux:tabs variant="segmented">
                <flux:tab name="add">Add Item</flux:tab>
                <flux:tab name="list">List</flux:tab>
            </flux:tabs>
        </div>
        <flux:tab.panel name="add">
            <div class="mx-auto max-w-xl">
                <livewire:create-item :$kid hidePurchased="true" />
            </div>
        </flux:tab.panel>
        <flux:tab.panel name="list">
            <livewire:item-index :$kid disableDelete="true" />
        </flux:tab.panel>
    </flux:tab.group>
</div>

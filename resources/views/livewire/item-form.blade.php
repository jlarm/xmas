<div>
    <div class="mb-5 text-center">
        <flux:heading size="lg">{{ $kid->name }}</flux:heading>
        <flux:subheading>Add an item to your list.</flux:subheading>
    </div>
    <livewire:create-item :$kid hidePurchased="true" />
    <flux:modal wire:model.self="showAuthModal" name="edit-profile" class="space-y-3 md:w-96">
        <flux:input wire:model="passcode" label="Passcode" />
        <flux:button wire:click="checkPasscode" type="submit" variant="danger" class="w-full">Submit</flux:button>
    </flux:modal>
</div>

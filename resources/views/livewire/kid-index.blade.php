<flux:tab.group>
    <flux:tabs>
        @foreach ($kids as $kid)
            <flux:tab :name="$kid->name" wire:key="{{ $kid->id }}">{{ $kid->name }}</flux:tab>
        @endforeach
    </flux:tabs>

    @foreach ($kids as $kid)
        <flux:tab.panel :name="$kid->name" wire:key="{{ $kid->id }}">
            <div class="grid gap-10 md:grid-cols-3">
                <div class="md:col-span-2">
                    <livewire:item-index :$kid />
                </div>
                <div class="md:col-span-1">
                    <livewire:create-item :$kid />
                </div>
            </div>
        </flux:tab.panel>
    @endforeach
</flux:tab.group>

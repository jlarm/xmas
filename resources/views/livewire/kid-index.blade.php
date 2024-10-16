<flux:tab.group>
    <flux:tabs>
        @foreach ($kids as $kid)
            <flux:tab :name="$kid->name">{{ $kid->name }}</flux:tab>
        @endforeach
    </flux:tabs>

    @foreach ($kids as $kid)
        <flux:tab.panel :name="$kid->name">
            <div class="grid grid-cols-3 gap-10">
                <div class="col-span-2">
                    <livewire:item-index :$kid />
                </div>
                <div class="col-span-1">
                    <livewire:create-item :$kid />
                </div>
            </div>
        </flux:tab.panel>
    @endforeach
</flux:tab.group>

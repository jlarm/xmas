<flux:tab.group>
    <flux:tabs>
        @foreach ($kids as $kid)
            <flux:tab :name="$kid->name">{{ $kid->name }}</flux:tab>
        @endforeach
    </flux:tabs>

    @foreach ($kids as $kid)
        <flux:tab.panel :name="$kid->name">
            {{ $kid->name }}
        </flux:tab.panel>
    @endforeach
</flux:tab.group>

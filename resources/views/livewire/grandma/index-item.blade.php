<flux:row>
    <flux:cell class="">
        {{ Str::title($item->name) }}
        <span class="block text-xs">
            {{ $item->size ? Str::title($item->size) . ' -' : '' }} {{ Str::title($item->color) ?? '' }}
        </span>
    </flux:cell>

    <flux:cell class="whitespace-nowrap">{{ Str::title($item->store) }}</flux:cell>

    <flux:cell>
        <flux:checkbox
            wire:model.live="purchased"
            wire:click="purchased"
            wire:confirm="{{ $item->purchased ? 'Are you sure you want to mark this item not purchased?' : 'Are you sure you want to mark this item purchased?' }}"
        />
    </flux:cell>

    <flux:cell variant="strong">${{ $item->price }}</flux:cell>

    <flux:cell>
        <flux:button
            type="link"
            target="_blank"
            href="{{ $item->link }}"
            icon-trailing="arrow-up-right"
            size="xs"
            variant="ghost"
            inset="top bottom"
        >
            View
        </flux:button>
    </flux:cell>
</flux:row>

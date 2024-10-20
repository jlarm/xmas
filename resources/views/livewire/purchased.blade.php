<div>
    <div class="gird-cols-1 grid gap-5 md:grid-cols-2">
        @forelse ($this->items as $item)
            <div
                wire:key="{{ $item->id }}"
                class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400"
            >
                <div class="min-w-0 flex-1">
                    <div class="focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        <p class="text-sm font-medium text-gray-900">{{ Str::limit($item->name, 40) }}</p>
                        <span class="text-xs text-gray-500">{{ $item->store }}</span>
                        <div class="mt-1">
                            @if ($item->size)
                                <flux:badge size="sm">{{ $item->size }}</flux:badge>
                            @endif

                            @if ($item->color)
                                <flux:badge size="sm">{{ $item->color }}</flux:badge>
                            @endif

                            @if ($item->price)
                                <flux:badge size="sm" color="lime">
                                    {{ $item->price ? Number::currency($item->price / 100) : '' }}
                                </flux:badge>
                            @endif
                        </div>
                        <div class="absolute right-3 top-3">
                            <flux:dropdown>
                                <flux:button variant="subtle" icon="ellipsis-vertical"></flux:button>

                                <flux:navmenu>
                                    @if ($item->link)
                                        <flux:navmenu.item
                                            href="{{ $item->link }}"
                                            target="_blank"
                                            icon="arrow-top-right-on-square"
                                        >
                                            View
                                        </flux:navmenu.item>
                                    @endif

                                    @if (! $item->purchased)
                                        <flux:navmenu.item
                                            wire:click="deleteItem({{ $item->id }})"
                                            wire:confirm="Are you sure you want to delete this item?"
                                            variant="danger"
                                            icon="trash"
                                        >
                                            Delete
                                        </flux:navmenu.item>
                                    @endif
                                </flux:navmenu>
                            </flux:dropdown>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <flux:header>Nothing purchased yet.</flux:header>
        @endforelse
    </div>
    <div class="mt-5">
        {{ $this->items->links() }}
    </div>
</div>

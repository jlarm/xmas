<div
    wire:key="{{ $item->id }}"
    class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm hover:border-gray-400 dark:border-gray-600 dark:bg-gray-700"
>
    <div class="min-w-0 flex-1">
        <div class="focus:outline-none">
            <span class="absolute inset-0" aria-hidden="true"></span>
            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ Str::limit($item->name, 40) }}</p>
            <span class="text-xs text-gray-500 dark:text-white">{{ $item->store }}</span>
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

                        <flux:navmenu.item wire:click="edit" icon="pencil">Edit</flux:navmenu.item>

                        @if (auth()->user())
                            <flux:navmenu.item
                                wire:click="$parent.deleteItem({{ $item->id }})"
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
    <flux:modal name="item-edit" class="space-y-6" variant="flyout">
        <flux:heading>Edit Item</flux:heading>
        <div>
            <form wire:submit="update" class="space-y-5">
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

                @if (auth()->user())
                    <flux:checkbox wire:model="purchased" label="Already Purchased" />
                @endif

                <flux:button type="submit" variant="primary">Update Item</flux:button>
            </form>
        </div>
    </flux:modal>
</div>

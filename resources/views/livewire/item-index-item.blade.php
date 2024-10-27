<div>
    <div class="relative">
        <div class="relative h-72 w-full overflow-hidden rounded-lg">
            @if ($item->getFirstMedia('images'))
                <img
                    src="{{ $item->getFirstMediaUrl('images', 'main') }}"
                    alt=""
                    class="h-full w-full object-cover object-center"
                />
            @else
                <img
                    src="{{ asset('santa.jpg') }}"
                    class="h-full w-full bg-gray-500 object-cover object-center"
                    alt=""
                />
            @endif
        </div>
        <div class="relative mt-4">
            <h3 class="text-sm font-medium text-gray-900 dark:text-white">{{ $item->name }}</h3>
            <p class="mt-1 text-sm text-gray-500">{{ $item->store }}</p>
            <p class="mt-1 text-sm text-gray-500">Size: {{ $item->size ? Str::title($item->size) : '-' }}</p>
            <p class="mt-1 text-sm text-gray-500">Color: {{ $item->color ? Str::title($item->color) : '-' }}</p>
        </div>
        <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
            <div
                aria-hidden="true"
                class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"
            ></div>
            <div class="flex w-full items-center justify-between">
                <p class="relative text-lg font-semibold text-white">
                    {{ $item->price ? Number::currency($item->price / 100) : '' }}
                </p>
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
                                wire:click="markPurchased"
                                wire:confirm="Are you sure you want to mark this item as purchased?"
                                icon="credit-card"
                            >
                                Mark Purchased
                            </flux:navmenu.item>
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

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
                    <flux:button icon="ellipsis-vertical"></flux:button>

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
            <form wire:submit="editItem" class="space-y-5">
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

                <div class="flex items-center gap-3">
                    @if ($image)
                        <div class="relative h-24 w-24">
                            @if ($item->getFirstMedia('images'))
                                <button
                                    wire:click.prevent="deleteImg"
                                    class="absolute right-0.5 top-0.5 rounded-md bg-slate-200 bg-opacity-75 p-1 text-slate-600 hover:text-red-500 dark:bg-slate-800 dark:text-slate-400"
                                >
                                    <svg
                                        wire:loading.remove
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        class="size-4"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"
                                        ></path>
                                    </svg>
                                    <svg
                                        wire:loading
                                        class="h-5 w-5 animate-spin text-white"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <circle
                                            class="opacity-25"
                                            cx="12"
                                            cy="12"
                                            r="10"
                                            stroke="currentColor"
                                            stroke-width="4"
                                        ></circle>
                                        <path
                                            class="opacity-75"
                                            fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                        ></path>
                                    </svg>
                                </button>
                                <img
                                    src="{{ $item->getFirstMediaUrl('images', 'main') }}"
                                    class="h-24 w-24 flex-none rounded-lg bg-gray-800 object-cover"
                                    alt=""
                                />
                            @else
                                <button
                                    wire:click.prevent="removeTempImage"
                                    class="absolute right-0.5 top-0.5 rounded-md bg-slate-200 bg-opacity-75 p-1 text-slate-600 hover:text-red-500 dark:bg-slate-800 dark:text-slate-400"
                                >
                                    <svg
                                        wire:loading.remove
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        class="size-4"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"
                                        ></path>
                                    </svg>
                                    <svg
                                        wire:loading
                                        class="h-5 w-5 animate-spin text-white"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <circle
                                            class="opacity-25"
                                            cx="12"
                                            cy="12"
                                            r="10"
                                            stroke="currentColor"
                                            stroke-width="4"
                                        ></circle>
                                        <path
                                            class="opacity-75"
                                            fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                        ></path>
                                    </svg>
                                </button>
                                <img
                                    src="{{ $image->temporaryUrl() }}"
                                    alt=""
                                    class="h-24 w-24 flex-none rounded-lg bg-gray-800 object-cover"
                                />
                            @endif
                        </div>
                    @else
                        <label
                            for="image"
                            class="flex h-24 w-24 items-center justify-center rounded-lg bg-gray-600 object-cover hover:cursor-pointer"
                        >
                            <svg
                                wire:loading
                                class="h-5 w-5 animate-spin text-white"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <circle
                                    class="opacity-25"
                                    cx="12"
                                    cy="12"
                                    r="10"
                                    stroke="currentColor"
                                    stroke-width="4"
                                ></circle>
                                <path
                                    class="opacity-75"
                                    fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                ></path>
                            </svg>
                            <svg
                                wire:loading.remove
                                class="size-10 text-gray-400"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path
                                    d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"
                                />
                                <circle cx="12" cy="13" r="3" />
                            </svg>
                            <input type="file" wire:model="image" id="image" class="sr-only" accept="image/jpg,png" />
                        </label>
                    @endif
                </div>

                @if (auth()->user())
                    <flux:checkbox wire:model="purchased" label="Already Purchased" />
                @endif

                <flux:button type="submit" variant="primary">Update Item</flux:button>
            </form>
        </div>
    </flux:modal>
</div>

<div>
    <form wire:submit.prevent="addItem" class="space-y-5">
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

        <flux:field>
            <flux:label>Upload Image</flux:label>

            <div class="flex items-center gap-3">
                @if ($image)
                    <div class="relative h-24 w-24">
                        <button
                            wire:click="removeTempImage"
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
                        <input type="file" wire:model="image" id="image" class="sr-only" accept="image/*" />
                    </label>
                @endif
            </div>

            <flux:error name="image" />
        </flux:field>

        @if (! $hidePurchased)
            <flux:checkbox wire:model="purchased" label="Already Purchased" />
        @endif

        <flux:button type="submit" variant="primary">Add Item</flux:button>
    </form>
</div>

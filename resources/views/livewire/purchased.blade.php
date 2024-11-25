<div>
    <div class="gird-cols-1 grid gap-5 md:grid-cols-3">
        @forelse ($items as $item)
            <div>
                <div class="relative">
                    <div class="relative h-72 w-full overflow-hidden rounded-lg">
                        @if ($item->grandma)
                            <flux:badge class="absolute right-4 top-4" variant="solid" color="green">
                                Purchased By Grandma
                            </flux:badge>
                        @endif

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
                        <p class="mt-1 text-sm text-gray-500">
                            Size: {{ $item->size ? Str::title($item->size) : '-' }}
                        </p>
                        <p class="mt-1 text-sm text-gray-500">
                            Color: {{ $item->color ? Str::title($item->color) : '-' }}
                        </p>
                    </div>
                    <div
                        class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4"
                    >
                        <div
                            aria-hidden="true"
                            class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"
                        ></div>
                        <div class="flex w-full items-center justify-between">
                            <p class="relative text-lg font-semibold text-white">${{ $item->price }}</p>
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
        {{ $items->links() }}
    </div>
</div>

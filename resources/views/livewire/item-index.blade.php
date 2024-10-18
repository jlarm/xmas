<div>
    <div class="gird-cols-1 grid gap-5 md:grid-cols-2">
        @foreach ($this->items as $item)
            <div
                class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400"
            >
                <div class="min-w-0 flex-1">
                    <a @if ($item->link) href="{{ $item->link }}" @endif target="_blank" class="focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        <p class="text-sm font-medium text-gray-900">{{ $item->name }}</p>
                        <p class="truncate text-sm text-gray-500">
                            {{ $item->size }} {{ $item->color }}
                            {{ $item->price ? Number::currency($item->price / 100) : '' }}
                        </p>
                        @if ($item->link)
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="absolute right-3 top-3 size-4 text-gray-400"
                            >
                                <path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6" />
                                <path d="m21 3-9 9" />
                                <path d="M15 3h6v6" />
                            </svg>
                        @endif
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-5">
        {{ $this->items->links() }}
    </div>
</div>

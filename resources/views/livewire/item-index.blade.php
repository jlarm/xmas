<div>
    <div class="gird-cols-1 grid gap-5 md:grid-cols-2">
        @foreach ($items as $item)
            <livewire:item-index-item :$item :key="$item->id" />
        @endforeach
    </div>
    <div class="mt-5">
        {{ $items->links() }}
    </div>
</div>

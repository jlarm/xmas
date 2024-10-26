<dl class="my-8 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">
    <div class="flex flex-col bg-gray-400/5 p-8">
        <dt class="text-sm font-semibold leading-6 text-gray-600">Items</dt>
        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">{{ $this->totalItems() }}</dd>
    </div>
    <div class="flex flex-col bg-gray-400/5 p-8">
        <dt class="text-sm font-semibold leading-6 text-gray-600">Total Cost</dt>
        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">
            {{ Number::currency($this->totalCost()) }}
        </dd>
    </div>
    <div class="flex flex-col bg-gray-400/5 p-8">
        <dt class="text-sm font-semibold leading-6 text-gray-600">Items Purchased</dt>
        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">{{ $this->totalPurchased() }}</dd>
    </div>
    <div class="flex flex-col bg-gray-400/5 p-8">
        <dt class="text-sm font-semibold leading-6 text-gray-600">Total Spent</dt>
        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">
            {{ Number::currency($this->totalSpent()) }}
        </dd>
    </div>
</dl>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Sale') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('sales.store') }}">
                    @csrf

                    <div>
                        <label for="buyer_name">Buyer Name</label>
                        <input id="buyer_name" class="block mt-1 w-full" type="text" name="buyer_name" required />
                    </div>

                    <div>
                        <label for="buyer_address">Buyer Address</label>
                        <input id="buyer_address" class="block mt-1 w-full" type="text" name="buyer_address" required />
                    </div>

                    <div>
                        <label for="item_id">Item</label>
                        <select name="item_id" id="item_id" required>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="sale_qty">Sale Quantity</label>
                        <input id="sale_qty" class="block mt-1 w-full" type="number" name="sale_qty" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

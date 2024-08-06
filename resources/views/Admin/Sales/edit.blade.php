<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Sale') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if ($errors->any())
                    <div role="alert" class="alert alert-warning rounded-none">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <div class="flex items-center justify-center gap-2">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <li>{{ $error }}</li>
                            </div>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('sales.update', $sales->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="buyer_name" class="block font-medium text-sm text-gray-700">Buyer Name</label>
                        <input type="text" name="buyer_name" id="buyer_name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('buyer_name', $sales->buyer_name) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="buyer_address" class="block font-medium text-sm text-gray-700">Buyer Address</label>
                        <input type="text" name="buyer_address" id="buyer_address" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('buyer_address', $sales->buyer_address) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="item_id" class="block font-medium text-sm text-gray-700">Item</label>
                        <select name="item_id" id="item_id" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}" {{ $sales->item_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="sale_qty" class="block font-medium text-sm text-gray-700">Sale Quantity</label>
                        <input type="number" name="sale_qty" id="sale_qty" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('sale_qty', $sales->sale_qty) }}" required>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Sale') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- resources/views/items/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                <div class="p-6 text-gray-900">
                    <form action="{{ route('items.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div class="form-control">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="form-control">
                            <label for="item_qty">Quantity:</label>
                            <input type="number" id="item_qty" name="item_qty" value="{{ old('item_qty') }}" required>
                        </div>

                        <div class="form-control">
                            <label for="supp_id">Supplier:</label>
                            <select id="supp_id" name="supp_id" required>
                                <option value="" selected disabled>Select Supplier</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-control">
                            <label for="buy_price">Buy Price:</label>
                            <input type="number" id="buy_price" name="buy_price" step="0.01" value="{{ old('buy_price') }}" required>
                        </div>

                        <div class="form-control">
                            <label for="sale_price">Sale Price:</label>
                            <input type="number" id="sale_price" name="sale_price" step="0.01" value="{{ old('sale_price') }}" required>
                        </div>

                        <button class="btn text-white" type="submit">Create Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

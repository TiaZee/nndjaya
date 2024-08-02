<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Sale') }}
        </h2>
    </x-slot>

    <style>
        
    </style>

    <div class="py-12 m-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('sales.store') }}" class="p-6 space-y-4 text-black">
                    @csrf

                    <div class="form-control">
                        <label for="buyer_name">Buyer Name</label>
                        <input id="buyer_name" class="block mt-1 w-full" type="text" name="buyer_name" required />
                    </div>

                    <div class="form-control">
                        <label for="buyer_address">Buyer Address</label>
                        <input id="buyer_address" class="block mt-1 w-full" type="text" name="buyer_address" required />
                    </div>

                    <div class="form-control">
                        <label for="item_id">Item</label>
                        <select name="item_id" id="item_id" required>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-control">
                        <label for="sale_qty">Sale Quantity</label>
                        <input id="sale_qty" class="block mt-1 w-full" type="number" name="sale_qty" required />
                    </div>

                    <div class="flex items-center mt-4">
                        <button type="submit" class="btn text-white">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

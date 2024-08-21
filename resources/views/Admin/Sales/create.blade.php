<x-app-layout>
    @section('title', 'Create Sale')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Sale') }}
        </h2>
    </x-slot>

    <style>

    </style>

    <div class="py-12 m-3">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
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
                            <!-- Opsi default yang dinonaktifkan -->
                            <option value="" disabled selected>SELECT ITEM</option>
                            <!-- Loop untuk menampilkan item dari database -->
                            @foreach($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-control">
                        <label for="sale_qty">Sale Quantity</label>
                        <input id="sale_qty" class="block mt-1 w-full" type="number" name="sale_qty" required />
                        <span id="stock_info">
                            <i>available stock: N/A</i>
                        </span>
                    </div>

                    <div class="flex items-center mt-4">
                        <button type="submit" class="btn btn-success text-white">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#item_id').on('change', function() {
                var itemId = $(this).val();

                if(itemId) {
                    $.ajax({
                        url: '/items/' + itemId + '/quantity',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#stock_info').html('<i>available stock: ' + data.item_qty + '</i>');
                        },
                        error: function() {
                            $('#stock_info').html('<i>available stock: N/A</i>');
                        }
                    });
                } else {
                    $('#stock_info').html('<i>available stock: N/A</i>');
                }
            });
        });
    </script>
</x-app-layout>

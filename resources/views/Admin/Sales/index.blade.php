<x-app-layout>
    @section('title', 'Sales')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales') }}
        </h2>
    </x-slot>

    <style>

    </style>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6 space-y-4" id="dash-content">
                @if (session('success'))
                    <div role="alert" class="alert alert-success rounded-none">
                        <div class="flex items-center justify-center gap-2">
                            <ul class="flex items-center gap-2 ">
                                <i class="fa-solid fa-circle-check"></i>
                                <li>
                                    {{ session('success') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('sales.create') }}" class="btn btn-success text-white">Add Sale</a>
                    <input type="text" id="searchInput" placeholder="Search..." class="px-4 py-2 border rounded-lg w-1/3">
                </div>
                <table class="table">
                    <thead class="text-black">
                        <tr>
                            <th>ID</th>
                            <th>Buyer Name</th>
                            <th>Buyer Address</th>
                            <th>Item Name</th>
                            <th>Sale Price</th>
                            <th>Sale Quantity</th>
                            <th>Sale Total</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-black">
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{ $sale->id }}</td>
                                <td>{{ $sale->buyer_name }}</td>
                                <td>{{ $sale->buyer_address }}</td>
                                <td>{{ $sale->name_item }}</td>
                                <td class="format-number">{{ $sale->sale_price }}</td>
                                <td class="format-number">{{ $sale->sale_qty }}</td>
                                <td class="format-number">{{ $sale->sale_total }}</td>
                                <td>{{ $sale->created_at }}</td>
                                <td>{{ $sale->updated_at }}</td>
                                <td class="flex flex-wrap gap-1">
                                    <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-error text-white btn-sm">Delete</button>
                                    </form>
                                    <a href="{{ route('sales.receipt', $sale->id) }}" class="btn btn-info text-white btn-sm">View Receipt</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="w-full flex justify-center text-black text-lg">
                    {{ $sales->links('vendor.pagination.daisy') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

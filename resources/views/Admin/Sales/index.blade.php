<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales') }}
        </h2>
    </x-slot>

    <style>

    </style>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 space-y-4">
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
                <a href="{{ route('sales.create') }}" class="btn text-white">Add Sale</a>
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
                                <td>{{ $sale->sale_qty }}</td>
                                <td class="format-number">{{ $sale->sale_total }}</td>
                                <td>{{ $sale->created_at }}</td>
                                <td>{{ $sale->updated_at }}</td>
                                <td class="flex gap-1">
                                    <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

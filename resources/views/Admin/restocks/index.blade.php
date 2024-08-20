<x-app-layout>
    @section('title', 'Restocks')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Restocks') }}
        </h2>
    </x-slot>

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
                    <a href="{{ route('restocks.create') }}" class="btn btn-success text-white">Add Restock</a>
                    <input type="text" id="searchInput" placeholder="Search..." class="px-4 py-2 border rounded-lg w-1/3">
                </div>
                <table class="table">
                    <thead class="text-black">
                        <tr>
                            <th>ID</th>
                            <th>Supplier Name</th>
                            <th>Item Name</th>
                            <th>Buy Price</th>
                            <th>Buy Qty</th>
                            <th>Buy Total</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-black">
                        @foreach($restocks as $restock)
                            <tr>
                                <td>{{ $restock->id }}</td>
                                <td>{{ $restock->supp_name }}</td>
                                <td>{{ $restock->name_item }}</td>
                                <td class="format-number">{{ $restock->buy_price }}</td>
                                <td class="format-number">{{ $restock->buy_qty }}</td>
                                <td class="format-number">{{ $restock->buy_total }}</td>
                                <td>{{ $restock->created_at }}</td>
                                <td>{{ $restock->updated_at }}</td>
                                <td class="flex flex-wrap gap-1">
                                    <a href="{{ route('restocks.edit', $restock->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('restocks.destroy', $restock->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-error text-white btn-sm">Delete</button>
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

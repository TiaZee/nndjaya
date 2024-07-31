<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Restocks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('restocks.create') }}" class="btn btn-primary">Add Restock</a>
                <table class="table">
                    <thead>
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
                    <tbody>
                        @foreach($restocks as $restock)
                            <tr>
                                <td>{{ $restock->id }}</td>
                                <td>{{ $restock->supp_name }}</td>
                                <td>{{ $restock->name_item }}</td>
                                <td>{{ $restock->buy_price }}</td>
                                <td>{{ $restock->buy_qty }}</td>
                                <td>{{ $restock->buy_total }}</td>
                                <td>{{ $restock->created_at }}</td>
                                <td>{{ $restock->updated_at }}</td>
                                <td>
                                    <a href="{{ route('restocks.edit', $restock->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('restocks.destroy', $restock->id) }}" method="POST" style="display:inline;">
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

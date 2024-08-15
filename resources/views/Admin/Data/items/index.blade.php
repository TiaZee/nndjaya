<!-- resources/views/items/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                <div class="p-6 text-gray-900 space-y-4">

                    <div class="flex justify-between items-center mb-4">
                        <a class="btn btn-success text-white" href="{{ route('items.create') }}">Add New Item</a>
                        <input type="text" id="searchInput" placeholder="Search..." class="px-4 py-2 border rounded-lg w-1/3">
                    </div>
                    <table class="table mt-4 text-black">
                        <thead class="text-black">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Supplier</th>
                                <th>Buy Price</th>
                                <th>Sale Price</th>
                                <th>Images</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="format-number">{{ $item->item_qty }}</td>
                                    <td>{{ $item->supplier->name }}</td> <!-- Assuming Supplier relationship -->
                                    <td class="format-number">{{ $item->buy_price }}</td>
                                    <td class="format-number">{{ $item->sale_price }}</td>
                                    <td>
                                        @if($item->item_photo)
                                        <img src="{{ asset($item->item_photo) }}" alt="{{ $item->name }}" width="100">
                                        @else
                                        No Image
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('items.edit', $item->id) }}">Edit</a>
                                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-error text-white btn-sm" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <script>
            document.getElementById('searchInput').addEventListener('keyup', function() {
                let filter = this.value.toLowerCase();
                let rows = document.querySelectorAll('table tbody tr');

                rows.forEach(row => {
                    let text = row.textContent.toLowerCase();
                    row.style.display = text.includes(filter) ? '' : 'none';
                });
            });
        </script> --}}
    </div>

</x-app-layout>

<x-app-layout>
    @section('title', 'Suppliers')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Suppliers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg" id="dash-content">
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
                        <a href="{{ route('suppliers.create') }}" class="btn btn-success text-white">Create New Supplier</a>
                        <input type="text" id="searchInput" placeholder="Search..." class="px-4 py-2 border rounded-lg w-1/3">
                    </div>


                    <table class="table mt-4 text-black">
                        <thead class="text-black">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Bank</th>
                                <th>Bank Number</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->id }}</td>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->city }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td>{{ $supplier->bank }}</td>
                                    <td>{{ $supplier->bank_number }}</td>
                                    <td>{{ $supplier->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>{{ $supplier->updated_at->format('Y-m-d H:i:s') }}</td>
                                    <td class="flex flex-wrap gap-1">
                                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-error text-white btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

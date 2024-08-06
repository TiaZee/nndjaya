<!-- resources/views/suppliers/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Supplier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div class="form-control">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $supplier->name) }}" required>
                        </div>

                        <div class="form-control">
                            <label for="city">City:</label>
                            <input type="text" id="city" name="city" value="{{ old('city', $supplier->city) }}" required>
                        </div>

                        <div class="form-control">
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" value="{{ old('address', $supplier->address) }}" required>
                        </div>

                        <div class="form-control">
                            <label for="bank">Bank:</label>
                            <input type="text" id="bank" name="bank" value="{{ old('bank', $supplier->bank) }}" required>
                        </div>

                        <div class="form-control">
                            <label for="bank_number">Bank Number:</label>
                            <input type="text" id="bank_number" name="bank_number" value="{{ old('bank_number', $supplier->bank_number) }}" required>
                        </div>

                        <button class="btn text-white" type="submit">Update Supplier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

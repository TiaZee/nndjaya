<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Supplier') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('suppliers.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="form-control">
                            <label for="id">ID:</label>
                            <input type="text" id="id" name="id" value="{{ old('id') }}">
                        </div>
                        <div class="form-control">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-control">
                            <label for="city">City:</label>
                            <input type="text" id="city" name="city" value="{{ old('city') }}">
                        </div>
                        <div class="form-control">
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" value="{{ old('address') }}">
                        </div>
                        <div class="form-control">
                            <label for="bank">Bank:</label>
                            <input type="text" id="bank" name="bank" value="{{ old('bank') }}">
                        </div>
                        <div class="form-control">
                            <label for="bank_number">Bank Number:</label>
                            <input type="text" id="bank_number" name="bank_number" value="{{ old('bank_number') }}">
                        </div>
                        <div>
                            <button class="btn" type="submit">Create Supplier</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

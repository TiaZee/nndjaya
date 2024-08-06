<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Restock') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center justify-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <li>{{ $error }}</li>
                    </div>
                @endforeach
                <form method="POST" action="{{ route('restocks.update', $restock->id) }}" class="p-6 space-y-4 text-black">
                    @csrf
                    @method('PUT')

                    <div class="form-control">
                        <label for="supp_id">Supplier</label>
                        <select name="supp_id" id="supp_id" required>
                            <option value="" selected disabled>Select Supplier</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ $restock->supp_id == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-control">
                        <label for="item_id">Item</label>
                        <select name="item_id" id="item_id" required>
                            <!-- Options will be populated by JavaScript -->
                        </select>
                    </div>

                    <div class="form-control">
                        <label for="buy_qty">Buy Quantity</label>
                        <input id="buy_qty" class="block mt-1 w-full" type="number" name="buy_qty" value="{{ $restock->buy_qty }}" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const supplierSelect = document.getElementById('supp_id');
            const itemSelect = document.getElementById('item_id');
            const items = @json($items);

            function updateItems() {
                const selectedSupplierId = supplierSelect.value;
                itemSelect.innerHTML = ''; // Clear previous options

                items.filter(item => item.supp_id == selectedSupplierId).forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.id;
                    option.textContent = item.name;
                    itemSelect.appendChild(option);
                });

                // Set the previously selected item
                @json($restock->item_id) && (itemSelect.value = @json($restock->item_id));
            }

            supplierSelect.addEventListener('change', updateItems);

            // Initialize items
            updateItems();
        });
    </script>
</x-app-layout>

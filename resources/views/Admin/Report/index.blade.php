<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Include Flatpickr CSS -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

                <form method="GET" action="{{ route('report.index') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="date_a" class="block font-medium text-sm text-gray-700">Start Date</label>
                        <input type="text" name="date_a" id="date_a" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ request('date_a') }}">
                    </div>

                    <div class="mb-4">
                        <label for="date_b" class="block font-medium text-sm text-gray-700">End Date</label>
                        <input type="text" name="date_b" id="date_b" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ request('date_b') }}">
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Generate Report') }}
                        </button>
                    </div>
                </form>

                <!-- Include Flatpickr JS -->
                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        flatpickr("#date_a", {
                            dateFormat: "Y-m-d",
                            defaultDate: "{{ request('date_a') }}"
                        });
                        flatpickr("#date_b", {
                            dateFormat: "Y-m-d",
                            defaultDate: "{{ request('date_b') }}"
                        });
                    });
                </script>

                @if(isset($reportData))
                    <div class="mt-6">
                        <h3 class="font-semibold text-lg">Report from {{ request('date_a') }} to {{ request('date_b') }}</h3>

                        <table class="table-auto w-full mt-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Item Name</th>
                                    <th class="px-4 py-2">Item Restock Total</th>
                                    <th class="px-4 py-2">Buy Price Total</th>
                                    <th class="px-4 py-2">Item Sales Total</th>
                                    <th class="px-4 py-2">Sale Price Total</th>
                                    <th class="px-4 py-2">In-Stock Item Quantity</th>
                                    <th class="px-4 py-2">Current Stock Value</th>
                                    <th class="px-4 py-2">Sold-Out Profit</th>
                                    <th class="px-4 py-2">Curent Profit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reportData as $data)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $data['item_name'] }}</td>
                                        <td class="border px-4 py-2">{{ $data['restock_quantity'] }}</td>
                                        <td class="border px-4 py-2">{{ $data['money_spent'] }}</td>
                                        <td class="border px-4 py-2">{{ $data['sale_quantity'] }}</td>
                                        <td class="border px-4 py-2">{{ $data['money_earned'] }}</td>
                                        <td class="border px-4 py-2">{{ $data['item_quantity'] }}</td>
                                        <td class="border px-4 py-2">{{ $data['current_stock_value'] }}</td>
                                        <td class="border px-4 py-2">{{ $data['sold_out_profit'] }}</td>
                                        <td class="border px-4 py-2">{{ $data['profit'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

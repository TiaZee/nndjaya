<x-app-layout>
    @section('title')
        {{ Auth::user()->role }} Dashboard
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @role('Owner')
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex gap-5 flex-wrap">
                        <div class="w-[160px] bg-green-500 p-3 text-white">
                            <h1 class="text-md font-bold">BARANG PALING LARIS :</h1>
                            <span>{{ $topItem }} ({{ $totalSales }})</span>
                        </div>
                        <div class="w-[160px] bg-yellow-500 p-3 text-white">
                            <h1 class="text-md font-bold">TOTAL ITEMS</h1>
                            <span>{{ $itemsCount }}</span>
                        </div>
                        <div class="w-[160px] bg-red-500 p-3 text-white">
                            <h1 class="text-md font-bold">TOTAL MONTHLY SALES</h1>
                            <span>{{ $monthlySalesFormatted }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elserole('Admin')
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>hi {{ Auth::user()->role }}</p>
                </div>
            </div>
        </div>
    </div>
    @elserole('Accountant')
    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>hi {{ Auth::user()->role }}</p>
                </div>
            </div>
        </div>
    </div>
    @endrole
</x-app-layout>

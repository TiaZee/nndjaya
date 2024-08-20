<x-app-layout>
    @section('title', 'Receipt')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Receipt') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 space-y-4 text-black">
                <center class="font-bold mb-8">
                    <h1 class="text-lg">{{ $title }}</h1>
                    <hr>
                    <h2 class="text-sm text-gray-500">{{ $subtitle }}</h2>
                </center>
                <div> <!-- Container Receipt  -->
                    <div> <!-- top  -->
                        <table>
                            <tbody>
                                <tr>
                                    <td class="font-bold">Restock ID</td>
                                    <td class="px-2">:</td>
                                    <td>{{ $restock_id }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Buyer Name</td>
                                    <td class="px-2">:</td>
                                    <td>{{ $buyer_name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Address</td>
                                    <td class="px-2">:</td>
                                    <td>{{ $address }}</td>
                                </tr>
                                <tr>
                                    <td class="font-bold">Billed</td>
                                    <td class="px-2">:</td>
                                    <td>{{ $billed }}</td>
                                </tr>

                            </tbody>

                        </table>
                        {{-- <p><strong>Restock ID:</strong> {{ $restock_id }}</p>
                        <p><strong>Buyer Name:</strong> {{ $buyer_name }}</p>
                        <p><strong>Address:</strong> {{ $address }}</p>
                        <p><strong>Billed:</strong> {{ $billed }}</p> --}}
                    </div>
                    <div class="mt-5 mb-5" id="dash-content"> <!-- mid (table)  -->
                        <table class="table">
                            <thead>
                                <tr class="font-bold text-black">
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $item_name }}</td>
                                    <td>{{ $item_quantity }}</td>
                                    <td>{{ $price }}</td>
                                    <td>{{ $total }}</td>
                                </tr>
                            </tbody>
                            <td class="font-bold">Sub Total:</td>
                            <td>{{ $total }}</td>
                        </table>
                    </div>
                    <div> <!-- end (Syarat dan Ketentuan)  -->
                        <p>Terima kasih telah membeli di toko kami</p>
                        <br>
                        <p>Syarat dan ketentuan pengembalian :</p>
                        <p>1. Nota ini jangan sampai hilang</p>
                        <p>2. Jika ada masalah terhadap item yang dibeli silahkan hubungi admin kami</p>
                        <p>3. Kerusakan item hanya diterima jika 1/4 item rusak</p>
                        <br>
                    </div>
                </div>
                <div>
                    <a href="{{ route('sales.receipt.print', $restock_id) }}" class="btn btn-primary">Confirm and Print</a>
                    <a href="{{ route('sales.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

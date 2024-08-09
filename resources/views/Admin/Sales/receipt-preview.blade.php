<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Receipt') }}
        </h2>
    </x-slot>
    <h1>{{ $title }}</h1>
    <h2>{{ $subtitle }}</h2>
    <div> <!-- Container Receipt  -->
        <div> <!-- top  -->
            <p><strong>Restock ID:</strong> {{ $restock_id }}</p>
            <p><strong>Buyer Name:</strong> {{ $buyer_name }}</p>
            <p><strong>Address:</strong> {{ $address }}</p>
            <p><strong>Billed:</strong> {{ $billed }}</p>
        </div>
        <div> <!-- mid (table)  -->
            <table>
                <thead>
                    <tr>
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
                <td>Sub Total</td>
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

</x-app-layout>

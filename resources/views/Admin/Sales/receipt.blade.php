<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <center>
        <h1>{{ $title }}</h1>
        <h2>{{ $subtitle }}</h2>
    </center>

    <div> <!-- Container Receipt  -->
        <div> <!-- top  -->
            <p><strong>Restock ID:</strong> {{ $restock_id }}</p>
            <p><strong>Buyer Name:</strong> {{ $buyer_name }}</p>
            <p><strong>Address:</strong> {{ $address }}</p>
            <p><strong>Billed:</strong> {{ $billed }}</p>
        </div>
        <div> <!-- mid (table)  -->
            <table border="1">
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
</body>
</html>

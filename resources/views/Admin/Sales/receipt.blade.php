<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <h2>{{ $subtitle }}</h2>

    <p><strong>Restock ID:</strong> {{ $restock_id }}</p>
    <p><strong>Buyer Name:</strong> {{ $buyer_name }}</p>
    <p><strong>Address:</strong> {{ $address }}</p>
    <p><strong>Billed:</strong> {{ $billed }}</p>

    <table>
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                {{-- <th>Total</th> --}}
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $item_name }}</td>
                <td>{{ $item_quantity }}</td>
                <td>{{ $price }}</td>
                {{-- <td>{{ $total }}</td> --}}
            </tr>
        </tbody>
        <td>Total</td>
        <td>{{ $total }}</td>
    </table>
</body>
</html>

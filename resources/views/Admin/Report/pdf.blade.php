<!DOCTYPE html>
<html>
<head>
    <title>Pdf Report</title>
    <style>
        /* @page {
            margin: 100px; /* Atur margin di setiap halaman */
        } */

        body {
            margin: 0;
            padding: 0;
        }

        h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Konsistenkan margin tabel di setiap halaman */
            page-break-inside: auto;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <h2>Report from {{ request('date_a') }} to {{ request('date_b') }}</h2>

    @foreach($reportData->chunk(10) as $dataChunk)
    <div class="page">
        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Item Restock Total</th>
                    <th>Buy Price Total</th>
                    <th>Item Sales Total</th>
                    <th>Sale Price Total</th>
                    <th>In-Stock Item Quantity</th>
                    <th>Current Stock Value</th>
                    <th>Sold-Out Profit</th>
                    <th>Current Profit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataChunk as $data)
                    <tr>
                        <td>{{ $data['item_name'] }}</td>
                        <td>{{ $data['restock_quantity'] }}</td>
                        <td>{{ $data['money_spent'] }}</td>
                        <td>{{ $data['sale_quantity'] }}</td>
                        <td>{{ $data['money_earned'] }}</td>
                        <td>{{ $data['item_quantity'] }}</td>
                        <td>{{ $data['current_stock_value'] }}</td>
                        <td>{{ $data['sold_out_profit'] }}</td>
                        <td>{{ $data['profit'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if(!$loop->last)
        <div class="page-break"></div>
    @endif
    @endforeach
</body>
</html>

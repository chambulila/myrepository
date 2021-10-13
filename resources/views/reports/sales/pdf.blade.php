<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sales report</title>
    <style>
        #tables{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #tables th, #tables td{
            border: 1px solid #ddd;
            padding: 8px;
        }
        #tables tr:nth-child(odd){
            background-color: #675;
        }
        #tables th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: rgb(74, 104, 45);
            color: white;
        }
    </style>
</head>
<body>
    <h2>Total sales</h2>
    <table id="tables">
        <thead>
            <tr>
                <th>#</th>
                <th>Item name</th>
                <th>Sold price</th>
                <th>Customer</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $sale->item->name ?? ""}}</td>
                <td>{{ $sale->amount }}</td>
                <td>{{ $sale->sale->customer_name }}</td>
                <td>{{ $sale->created_at }}</td>
            </tr>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        @endforeach
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>Date</th>
            <th>Invoice</th>
            <th>Customer</th>
            <th>Total Payment</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp

        @foreach($data_payment as $row)
            <tr>
                <td>{{ $no++; }}</td>
                <td>{{ $row->id }}</td>
                <td>{{ date('d/m/Y',strtotime($row->payment_date)) }}</td>
                <td>{{ $row->invoice->id }}</td>
                <td>{{ ucwords($row->invoice->customer->name) }}</td>
                <td>Rp {{ number_format($row->invoice->total) }}</td>
                <td>{{ ucwords($row->status) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>

                  

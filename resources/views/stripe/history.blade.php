<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    @include('layouts.app')
    <h1>Payment Details</h1>
    <table class="mx-auto">
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Amount</td>
            <td>{{ $paymentData[0] }}</td>
        </tr>
        <tr>
            <td>ID</td>
            <td>{{ $paymentData[1] }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>{{ $paymentData[2] }}</td>
        </tr>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Invoice</title>
</head>
<body>
    <h1>Detail Faktur</h1>
<p>Nomor Invoice: {{$invoice->invoiceNumber}}</p>
<p>Alamat Pengiriman: {{$invoice->shippingAddress}}</p>
<p>Kode Pos: {{$invoice->postalCode}}</p>
<h2>Detail Barang</h2>
@foreach ($invoice->skincares as $skincare)
    <p>{{$skincare->name}} - {{$skincare->pivot->stock}} - Subtotal: {{$skincare->price * $skincare->pivot->stock}}</p>
@endforeach
<p>Total Harga: {{ $invoice->skincares->sum(function($skincare){return $skincare->price * $skincare->pivot->stock;})}}</p>
</body>
</html>
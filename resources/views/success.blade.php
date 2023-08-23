<?php
use Illuminate\Support\Facades\Auth;

$user = Auth::check();

if (!$user) {
 header("Location: /login");
 exit;
}else if ($user > 0){
   header("Location: /login");
}
?>

<?php

  use Xendit\Xendit;

  $key= env('XENDIT_APP_KEY');

  Xendit::setApiKey($key);

  $invoiceId = session()->get('invoice_id');
  
  $id = $invoiceId;
  $getInvoice = \Xendit\Invoice::retrieve($id);

?>

<?php
function formatCurrency($value) {
  // Format the value as a currency with thousands separators
  return number_format($value, 0, ',', '.');
}


function generateRandomNumber() {
    $min = 1000000000; // Minimum 10-digit number
    $max = 9999999999; // Maximum 10-digit number
    return mt_rand($min, $max);
}


$kodeTiket = generateRandomNumber();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        .invoice {
            width: 80%;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .invoice-logo {
            width: 100px;
            height: auto;
        }
        .invoice-info {
            text-align: right;
        }
        .invoice-title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .invoice-details {
            display: flex;
            justify-content: space-between;
            font-size: 16px;
        }
        .item-list {
            border-collapse: collapse;
            width: 100%;
        }
        .item-list th, .item-list td {
            padding: 10px;
            text-align: left;
        }
        .item-list th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .total-amount {
            text-align: right;
            margin-top: 20px;
            font-size: 18px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <img class="invoice-logo" src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/travel-agency-logo%2C-travel-company-logo-%281%29-design-template-bc9dcb1ca0e92d6394dea26418a87c8e_screen.jpg?ts=1667975913" alt="Logo">
            <div class="invoice-info">
                <div class="invoice-title">Invoice ID : {{ $getInvoice['id'] }}</div>
                <div>Tanggal: {{ $getInvoice['created'] }}</div>
            </div>
        </div>
        <table class="item-list">
            <thead>
                <tr>
                    <th>Paket Wisata</th>
                    <th>Kode Tiket Anda</th>
                    <th>E-mail Pembeli</th>
                    <th>Bank</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $getInvoice['description'] }}</td>
                    <td>{{ $kodeTiket }}</td>
                    <td>{{ $getInvoice['payer_email'] }}</td>
                    <td>{{ $getInvoice['bank_code'] }}</td>
                    <td>Rp. {{ formatCurrency($getInvoice['amount']) }}</td>
                </tr>
                <!-- Add more items here -->
            </tbody>
        </table>
        <div class="total-amount">
            Total Amount: Rp. {{ formatCurrency($getInvoice['amount']) }}
        </div>
    </div>
    <div class="footer">
     Harap Berikan Kode Tiket Ini Kepada Petugas Kami </br></br>Terima Kasih Atas Pembelian Anda !
    </div>
    @include('components.footer')
</body>
</html>
<?php
session_start();
require "PHPMailer/src/PHPMailer.php"; 
require "PHPMailer/src/SMTP.php"; 
require 'PHPMailer/src/Exception.php'; 
$mail = new PHPMailer\PHPMailer\PHPMailer(true);


$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$output .= '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
        background: #eee;
        margin-top: 20px;
    }
    .text-danger strong {
        color: #9f181c;
    }
    .receipt-main {
        background: #ffffff;
        border-bottom: 12px solid #333333;
        border-top: 12px solid #9f181c;
        margin-top: 50px;
        margin-bottom: 50px;
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #acacac;
        color: #333333;
        font-family: open sans;
    }
    .receipt-main p {
        color: #333333;
        font-family: open sans;
        line-height: 1.42857;
    }
    .receipt-footer h1 {
        font-size: 15px;
        font-weight: 400 !important;
        margin: 0 !important;
    }
    .receipt-main::after {
        background: #414143;
        content: "";
        height: 5px;
        left: 0;
        position: absolute;
        right: 0;
        top: -13px;
    }
    .receipt-main thead {
        background: #414143;
    }
    .receipt-main thead th {
        color: #fff;
    }
    .receipt-right h5 {
        font-size: 16px;
        font-weight: bold;
        margin: 0 0 7px 0;
    }
    .receipt-right p {
        font-size: 12px;
        margin: 0px;
    }
    .receipt-right p i {
        text-align: center;
        width: 18px;
    }
    .receipt-main td, .receipt-main th {
        padding: 9px 20px !important;
        font-size: 13px;
    }
    .receipt-main td h2 {
        font-size: 20px;
        font-weight: 900;
        margin: 0;
        text-transform: uppercase;
    }
    .receipt-header-mid .receipt-left h1 {
        font-weight: 100;
        margin: 34px 0 0;
        text-align: right;
        text-transform: uppercase;
    }
    .receipt-header-mid {
        margin: 24px 0;
        overflow: hidden;
    }
  </style>
</head>
<body>';

$output .= '<div class="container">   
<div class="row justify-content-center">
    <div class="receipt-main col-md-6">
        <div class="row">
            <div class="col-6">
                <div class="receipt-left">
                    <img class="img-fluid rounded-circle" alt="Company Logo" src="https://bootdey.com/img/Content/avatar/avatar6.png" style="width: 71px;">
                </div>
            </div>
            <div class="col-6 text-end">
                <div class="receipt-right">
                    <h5>Company Name</h5>
                    <p><i class="fas fa-phone"></i> +1 3649-6589</p>
                    <p><i class="fas fa-envelope"></i> company@gmail.com</p>
                    <p><i class="fas fa-map-marker-alt"></i> USA</p>
                </div>
            </div>
        </div>
        
        <div class="row receipt-header-mid">
            <div class="col-8 text-start">
                <div class="receipt-right">
                    <h5>Customer Name</h5>
                    <p><b>Mobile :</b> +1 12345-4569</p>
                    <p><b>Email :</b> customer@gmail.com</p>
                    <p><b>Address :</b> New York, USA</p>
                </div>
            </div>
            <div class="col-4">
                <div class="receipt-left">
                    <h3>INVOICE # 102</h3>
                </div>
            </div>
        </div>
        
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>';
                $total = 0; // initialize total
                foreach ($_SESSION['cart'] as $key => $value) {
                    $total += $value['price'] * $value['soluong'];
                    $output .= '<tr>
                    <td>'.$value['name'].'</td>
                    <td><i class="fas fa-inr"></i> '.$value['price'].'</td>
                </tr>';
            }
            $output .='<tr>
                <td class="text-end">
                    <p><strong>Total Amount:</strong></p>
                    <p><strong>Late Fees:</strong></p>
                    <p><strong>Payable Amount:</strong></p>
                    <p><strong>Balance Due:</strong></p>
                </td>
                <td>
                    <p><strong><i class="fas fa-inr"></i> '.number_format($value['price'] * $value['soluong'], 0, ',','.').' VND</strong></p>
                </td>
            </tr>
            <tr>
                <td class="text-end"><h2><strong>Total:</strong></h2></td>
                <td class="text-start text-danger"><h2><strong><i class="fas fa-inr"></i>'.number_format($total, 0, ',','.').'</strong></h2></td>
            </tr>
                </tbody>
            </table>
        </div>
        
        <div class="row receipt-footer">
            <div class="col-8 text-start">
                <div class="receipt-right">
                    <p><b>Date :</b> 15 Aug 2016</p>
                    <h5 style="color: rgb(140, 140, 140);">Thanks for shopping!</h5>
                </div>
            </div>
            <div class="col-4">
                <div class="receipt-left">
                    <h1>Stamp</h1>
                </div>
            </div>
        </div>
    </div>    
</div>
</div>';

$output .= '</body>
</html>';




if (empty($output)) {
echo "Không có sản phẩm nào trong giỏ hàng.";
exit;
}

try {
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->CharSet = "utf-8";
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'binhtranquoc2005@gmail.com';
$mail->Password = 'twdn uzna endc dcaa'; // mật khẩu ứng dụng
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('binhtranquoc2005@gmail.com', 'AdamStore');
$mail->addAddress('kegiaumatvideptrai@gmail.com');
$mail->isHTML(true);
$mail->Subject = 'Hoas don dien tu';
$mail->Body = nl2br($output);

$mail->smtpConnect([
    "ssl" => [
        "verify_peer" => false,
        "verify_peer_name" => false,
        "allow_self_signed" => true
    ]
]);
$mail->send();
unset($_SESSION['cart']);
header('location: /php1/');
} catch (Exception $e) {
echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
}
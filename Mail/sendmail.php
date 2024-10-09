<?php
session_start();
require "PHPMailer/src/PHPMailer.php"; 
require "PHPMailer/src/SMTP.php"; 
require 'PHPMailer/src/Exception.php'; 
$mail = new PHPMailer\PHPMailer\PHPMailer(true);


$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$output = '';
foreach ($_SESSION['cart'] as $key => $value) {
$output .= 'Item: ' . $value['name'] . ' - Giá: ' . $value['price'] . 'Số lượng: '.$value['soluong'].''  . '<br>';
}

if (empty($output)) {
echo "Không có sản phẩm nào trong giỏ hàng.";
exit;
}

try {
$mail->SMTPDebug = 2;
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
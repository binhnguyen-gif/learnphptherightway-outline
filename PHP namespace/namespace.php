<?php

require_once './PaymentGetWay/Stripe/Transaction.php';
require_once './PaymentGetWay/Paddle/Transaction.php';
require_once './PaymentGetWay/Paddle/CustomerProfile.php';

//use PaymentGetway\Paddle\Transaction;
//use PaymentGetway\Paddle AS PA;
use App\PaymentGetway\Paddle\{Transaction};
use App\PaymentGetway\Paddle\CustomerProfile;
use app\PaymentGetway\Stripe\Transaction as StripeTransaction;

// bí danh
//use PaymentGetway\Paddle\CustomerProfile;

//use const PaymentGetway\Paddle\Transaction;
//use function PaymentGetway\Paddle\Transaction;
// php sẽ không biết nên khởi tạo cái nào vì bao gồm 2 lớp trùng tên
// Coi không gian tên như các cấu trúc thư mục ảo cho các lớp
var_dump(new Transaction());
//var_dump(new DateTime());
//new \DateTime() dấu / yêu cầu không tải ngày giờ từ không
//gian tên cục bộ mà đi đến không gian tên chung

$paddleTransaction = new Transaction();
$stripeTransaction = new StripeTransaction();
$customerProfileTransaction = new CustomerProfile();

//$paddleTransaction = new PA\Transaction();
//$stripeTransaction = new StripeTransaction();
//$customerProfileTransaction = new PA\CustomerProfile();

// nếu include đưa một tệp khác vào file trên vi dụ
//include('views/layout.php'); thì tệp bao gồm này sẽ không kế thừa các lớp đã được nhập trong tệp cha
//vì vậy nếu muốn sử dụng thì cần nhập chúng như lớp cha


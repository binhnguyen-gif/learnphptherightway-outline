<?php

declare(strict_types=1);

//require_once 'namespace.php';
//require_once '../app/PaymentGetWay/Stripe/Transaction.php';
//require_once '../app/Notification/Email.php';
//require_once '../app/PaymentGetWay/Paddle/Transaction.php';
//require_once '../app/PaymentGetWay/Paddle/CustomerProfile.php';
//để giải quyết vấn đề này

//cách 1
//spl_autoload_register(function ($class) {
//    $path = __DIR__.'/../'.lcfirst(str_replace('\\', '/', $class)).'.php';
//    if (file_exists($path)) {
//        require $path;
//    }
//});


//spl_autoload_register(function ($class) {
//    var_dump('autoloader 1');
//});
//
//
//spl_autoload_register(function ($class) {
//    var_dump('autoloader 2');
//}, prepend: true);
//prepend: true chỉ định cái này load trước

//use app\PaymentGetway\Paddle\Transaction;
//
//$paddleTransaction = new Transaction();
//
//var_dump(new Transaction());
//cách 2 : Sử dụng composer để xử lý tự động tải là trình quản lý sự phụ thuộc

require __DIR__ . '/../vendor/autoload.php';

use App\PaymentGetway\Paddle\Transaction;
//
//$paddleTransaction = new Transaction();
//
//$id = new \Ramsey\Uuid\UuidFactory();
//
//echo $id->uuid4();
//
//var_dump($paddleTransaction);

//Class Constants
// truy cập hằng số ở cấp đồ lớp
//echo Transaction::STATUS_PAID;
//truy cập hằng số ở cấp đôk dối tượng
$paddleTransaction = new Transaction();

//$paddleTransaction->setStatus(Transaction::STATUS_PAID);
$paddleTransaction->setStatus(\App\Enums\Status::STATUS_PAID);
//$paddleTransaction->setStatus('đasda');

//echo $paddleTransaction::STATUS_PAID;

echo $paddleTransaction::class;
//https://wiki.php.net/rfc/enumerations
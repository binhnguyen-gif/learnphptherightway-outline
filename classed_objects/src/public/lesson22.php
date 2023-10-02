<?php

// Classes & Objects
// Một lớp như một bản thiết kế và đối tượng là thứ mà xây dựng từ bản thiết kế đó
// hay nói cách khác một instance của đối tượng lớp đó là một kiểu dữ liệu của php
// Kiểu dữ liệu đối tượng object
// Tạo đối object từ std chung
declare(strict_types = 1);

require '../Transaction.php';
// Tạo đối tượng
$transaction = new Transaction(100, 'Transaction 1');
//$transaction->amount = 13;
//var_dump($transaction);
//$transaction->addTax(5);
//$transaction->applyDiscount(5);


//    method chanining xâu chuỗi các phương thức
// Các phương thức xâu chuỗi sẽ không có ý nghĩa chúng tả phải hoàn thuế
//$amount = (new Transaction(100, 'Transaction 1'))->addTax(8)->applyDiscount(10)->getAmount();
$transaction->addTax(8)->applyDiscount(10);

echo "</br>";
var_dump($transaction->getAmount());
echo "</br>";
var_dump($transaction->getDescription());
$class = 'Transaction';
//Creating objects using variables
$transaction = new $class(100, 'Transaction 1');

//Creating multiple objects of the same class
$transaction1 = new $class(100, 'Transaction 1');
$transaction2 = new $class(200, 'Transaction 1');

var_dump($transaction1->getAmount(), $transaction2->getAmount());


// object(Transaction)#1 (0) { }
// result => là kiểu dữ liệu object và thể hiện của nó là một Transaction
// Một class có thể có các biến được gọi là t/uộc tính và hàm được gọi là phương thức

//Hàm hủy
//stdClass & object casting

$str = '{"a": 1, "b": 2, "c": 3,}';

$arr = json_decode($str);
// đối tượng là một thể hiện của stdClass key của mảng hoặc các khóa của json sẽ
// trở thành ác thuộc tính của lớp và giá trị sẽ trở thành giá tri của cách thuộc tính đó
var_dump($arr); // => object(stdClass)

$arr = json_decode($str, true);

var_dump($arr); // => array()

$obj = new \stdClass();

$obj->a = 1;
$obj->b = 2;

var_dump($obj);

$arr = [1, 2, 3];

var_dump((object) $arr);

$arr = [1, 2, 3];
$obj = (object) $arr;
var_dump($obj->{1});
//scalar
$obj = (object) 1;

var_dump($obj->scalar);
Ngôn ngữ lập trình: Cần biên dịch thành ngôn ngữ máy tập lệnh và ngôn ngữ cần được thông dịch(java, c++)
- PHP, javascript cần thông dịch (php yêu cầu một máy chủ javascript: trên trình duyệt)
composer require psr/simple-cache:^1.0 maatwebsite/excel
Lesson 1.2 - Syntax

00:00 Intro
00:41 Basic Syntax
01:58 Hello World
03:22 Run PHP In Terminal
php hello.php
03:50 Print vs Echo

- Print and Echo
print (có thể sử dụng được trong các biểu thức còn echo thì không thể)
ví dụ : echo print "Hello WOrld" (true)
print echo "Hello World" (Error)

- echo 'Hello', '', 'World';
- echo ("Hello World");

05:18 Escaping Quotes

echo 'Joe's Invoice'; (error)
echo 'Joe\'s Invoice'; (true)
echo "Joe's Invoice"; (true)

05:45 Variables

$name "tiger";
echo $name;

06:26 $this variable

$this = 'hello'; (error)

06:48 Assigning by Value vs Reference

$x = 1;
$y = $x;
$x = 3;

echo $y; result(1) 
//Tham chiếu
$x = 1;
$y = &$x;
$x = 3;

echo $y; result(3) 

07:45 Variables Within Text

$firstName = 'tiger';
echo 'Hello $firstName'; result(Hello $firstName)

$firstName = 'tiger';
echo "Hello $firstName"; result(Hello tiger)
echo 'Hello' . $firstName; result(Hello tiger)

08:52 PHP In HTML

<?php
$x = 10;
$y = 5;

echo $x. ', ' . $y;
 ?>
<?= 'Hello World' ?>

10:45 Comments
// Comment1
# Comment 2
/**
*    
*/
Note : Comments should not be nested 
- # ?> (fasle)

Lesson 1.3 - Constants & Variable Variables

00:00 - Intro
00:59 - Using define()
define('name', 'value'); (Biến và hằng đều phân biệt chữ hoa chữ thường)

01:28 - Constant Naming Rules
define('STATUS_PAID', 'paid'); 

02:00 - Print Constants
echo STATUS_PAID (true)
echo $STATUS_PAID (error)

02:23 - Check If Constant Has Been Defined
define('STATUS_PAID', 'paid'); 
echo define('STATUS_PAID') (true) result (1)
echo define('STATUS_VOID') (false) result ()
03:05 - Using Const Keyword
const STATUS_PAID = 'paid;
echo STATUS_PAID;

03:18 - Differences
Note: Hằng số được tạo bởi từ khóa const được xác định tại thời điểm biên dịch
Trong khi hằng số xác định bởi define xác định tại thời điểm chạy
Vì vậy không thể xác định hằng số bằng từ khóa const trong cấu trúc điều khiển
vd: 
if(true) {
   define('STATUS_PAID', 9);   (true)
}

if(true) {
   const STATUS_PAID; (error)
}
04:14 - Dynamic Constant Names
- Sử dụng biến để xác định tên hằng số
$paid = 'PAID';
define('STATUS_' . $paid, $paid);
echo STATUS_PAID;

04:49 - When To Use Constants
- Khi nào sử dụng hằng số (Bất cứ khi nào bạn có một dữ liệu tĩnh không thay đổi)
05:03 - Predefined Constants
- Hằng số được xác định trcs (default)
echo PHP_VERSION;

05:38 - Magic Constants
Predefined Constants - https://www.php.net/manual/en/reserved.constants.php
Magic Constants - https://www.php.net/manual/en/language.constants.magic.php
- Hằng số ma thuật (hằng số giá trị có thể thay đổi tùy thuộc nào nơi chúng được sử dụng)
vd: echo _LINE_ (in ra số dòng hiện tại tính đến dòng đang echo _LINE_)
echo _FILE_ (đường dẫn tệp nó đang được sử dụng)

06:14 - Variable Variables
$foo = 'bar';
$$foo = 'baz'; (tương tự như : $bar = 'baz')
NOTE: Biến lấy giá trị của biến và coi đó là tên của biến mới
echo $foo , $$foo; (true) result(barbaz)
echo "$foo , $$foo"; (false) result(bar, $bar)
echo "$foo , {$$foo}"; (true) result(bar, baz)
echo "$foo , ${$foo}"; (true) result(bar, baz)

Lesson 1.4 - Data Types & Casting
PHP Data Types - Typecasting Overview & How It Works
https://www.php.net/manual/en/language.types.type-juggling.php
https://www.php.net/manual/en/types.comparisons.php

00:00 - Intro
- Kiểu dữ 10 kiểu dữ liệu nguyên thủy 
#4 Scalar Types 
# bool - true / false
# int - 1, 2, 3, 8, -5
# float - 1.5, 0.1, 0.05, -15.8
# string - 'hello world'
# 4 Compund Types
# array
# object
# callable
# iterable
# 2 Special Types
# resource
# null
00:19 - Dynamically Types vs Statically Typed
01:18 - Scalar Types (bool, int, float, string)
03:05 - Get The Type Of The Variable (gettype, var_dump)
04:25 - Arrays (Compound Types)
# array
$companies = [1, 2, 3, 0.5, -9.2, 'A', 'b', true];
print_r($companies)
06:19 - Null Type
06:25 - Automatic Type Detection
07:05 - Type Hinting Example
function sum(int $x, int $y) {
    return $x + $y;
}

$sum = sum(2, '3');
08:22 - Type Juggling / Type Coercion
10:15 - Strict Types
Ràng buộc kiểu dữ liệu nghiệm ngặt hơn 
declare(strict_types=1);
- Nó sẽ báo lỗi khi dữ liệu không hợp lệ trong hàm nào đó như ví trên sẽ báo '3' 
- Ngoại lệ :
function sum(float $x, float $y) {
    return $x + $y;
}

echo sum(3.5, 2.5);
# echo sum(3, 2);
- Có nên sử dụng loại nghiệm ngặt và gợi ý nhập hay không phụ thuộc vào
vào p (sử dụng loại gợi ý và đánh dấu nhiều nhất có thể)

11:12 - Type Casting
$x = (int)'5';

PHP Boolean Data Type 
$isComplete = null;
intergers 0 -0 = false
float 0.0 -0.0 = false
'' = false
'0' = false
[] = false
null = false

if($isComplete) {
}
else {
}
-Check data type
is_bool, var_dump
Note: khi in cái gì đó echo nó sẽ có gắng chuyển nó thành chuỗi


PHP Integer Data type 
$x = 0x2A; result(42)
$x = (int) '87test' var_dump => int(87)
$x = (int) 'test' var_dump => int(0)
$x = (int) null var_dump => int(0)
is_int($x) -> result = true, false
Note : từ 7.4 php có xóa _ trong biến giá trị số (ko áp dụng cho chuỗi)
$x = 2_000_000_00; var_dump($x) result int(2000000000)


PHP Float Data Type 
https://floating-point-gui.de/
$x = 13.5e3; result(13500)

$x = 13.5-e3; result(0.0135)
$x = floor(0.1 + 0.7) * 10) result(7)
7.999999999999118
$x = ceil(0.1 + 0.7) * 10) result(8)
$x = ceil(0.1 + 0.2) * 10) result(4) ảo ma
0.300000000000004 + 10 = 3.000000000000000004

$x = 0.23;
$y = 1 - 0.77;

var_dump($x, $y); result x=>float(0.23) y=>float(0.23)

if($x == $y) {
   echo 'Yes';
} else {
    echo 'No';
}
result (No) 
Note : Không bao giờ nên so sánh trực tiếp các số float 
echo NAN result(NAN) viết tắt của not a number hiển thị khi một số thao tác
hoặc phép tính không thể tính được
vd: echo log(-1);
echo INF (infinity) =>result(INF)
echo PHP_FLOAT_MAX + 2 result(INF) số ...

var_dum(is_infinite($x)) result=> bool(true)
is_nan(log(-1)) => true
$x = (float)'strjd' => float(0)
$x = (float) '3.4a' => float(3.4)

valfloat

PHP String Data Type - Heredoc & Nowdoc Synta
https://www.php.net/manual/en/ref.strings.php
https://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc

$firstName = 'Will';
$lastName = 'Smith';

$name = $fileName . ' ' . $lastName;
echo $name . <br/>';

echo $name[-2]; result (t)
$name[1] = 'I'  => result (WIll Smith)

$name[-2] = 'I' => result (Will SmiIh)
var_dump($name); result => string(10)"Will SmiIh";
$name[15] = 'I'; 
var_dump($name); result => string(16)"Will Smith I";

$name = $fileName . ' ' . $lastName;
echo $name{1}; result(error)
//Heredoc
$text = <<<TEXT
Line 1
Line 2
Line 3 ' "
TEXT;
echo $text; => result : Line 1 Line 2 Line 3;
echo nl2br($text) 
=> result : 
Line 1 
Line 2 
Line 3 ' "
vd3: 
$x = 1;
$y = 2;

$text = <<<TEXT
Line 1 $x
Line 2 $y
Line 3
TEXT;

echo nl2br($text) 
=> result : 
Line 1 1
Line 2 2
Line 3

// Nowdoc
$text = <<<'TEXT'
Line 1 $x
Line 2 $y
Line 3 ' "
TEXT;

echo nl2br($text) 
=> result : 
Line 1 $x
Line 2 $y
Line 3 ' "


PHP Null Data Type 
- Là một kiểu dữ liệu đặc biệt đại diện cho một biến không có giá trị
Một biến có thể null nếu nó được gán hằng số null ,nó chưa được xác định hoặc chưa được đặt
//null constant
$x = null;
var_dump($x) result: NULL
var_dump(is_null($x)) result: bool(true)
$x;
var_dump($x) result (error) -> und


PHP Array Data Type - Indexed, Associative & Multi-Dimensional Arrays

00:00 - Intro
00:43 - What are arrays
01:27 - Indexed arrays & accessing elements
03:06 - Undefined array key
03:41 - Check if array key exists - isset()
04:04 - Mutate arrays
04:52 - Get length of array - count()
05:04 - Add elements to an array - square bracket syntax
05:37 - Add multiple elements to an array using array_push
06:05 - Name your keys (associative arrays)
07:11 - Add elements to associative arrays at specified keys
$programingLanguages = ['PHP', 'Java', 'Python'];
$programingLanguages[] = 'C++';

var_dump($programingLanguages);
result => 'PHP', 'Java', 'Python', 'C++'
or array_push($programingLanguages, 'C++', 'C')

07:45 - Multi-dimensional arrays
10:02 - Duplicate keys & overwriting
vd:
$array = [true => 'a', 1 => 'b', '1' => 'c', 1.8 => 'd'];
var_dump($array)
retsult: Array([1] => d)

$array = [true => 'a', 1 => 'b', '1' => 'c', 1.8 => 'd', null => 'e'];
var_dump($array)
retsult: Array([1] => d[] => e)

11:18 - Having keys on only some elements & how automatic indexing works
$array = ['a', 'b', 50 => 'c', 'd', 'e'];
var_dump($array);
result :
Array( [0] => a[1] => b[50] => c[51]=>d[52] )

12:05 - Removing an element from the end of an array using array_pop
12:27 - Removing an element from the beginning of an array using array_shift & re-indexing
13:14 - Removing element(s) from arrays by specifying keys using unset
13:59 - Using unset() does not re-index arrays
$array = [1, 2, 3];

unset($array[0], $array[1], $array[2]);

$array[] = 1;
print_r($array);
result: Array([3] => 1)
15:00 - Casting to arrays
$x = 5;
var_dump((array) $x); result tra ve array voi phan tu dau = 5
15:27 - Another way to check if the key exists in array & the difference between array_key_exists & isset()
$x = null;
var_dump(array_key_exist(key ,$array)); 
isset() sẽ cho biết $array[key] có tồn tại và nó ko phải là null hay ko


What Are Expressions In PHP & How They Are Evaluated (Biểu thức)
if($x < 5) {}


PHP Operators Part 1
-Toán tử nhị phân vì yêu cầu 2 toán hạng nếu là 3 thì là toán tử bậc 3
00:00 - Intro
00:47 - Arithmetic Operators (+ - * / % **)
04:35 - Assignment Operators (= += -= *= /= %= **=)
07:12 - String Operators (. .=)
07:39 - Comparison Operators (== === #= <> #=== < > ...    ?? ?:)
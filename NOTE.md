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
Được sử dụng dụng để dễ đọc chúng được trộn lẫn và không có giá trị
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
function sum($x, $y) {
    return $x + $y;
}

$sum = sum(2, '3');  return string(5)
08:22 - Type Juggling / Type Coercion
function sum(int $x, int $y) {
    return $x + $y;
}

$sum = sum(2, '3'); return int(5)


function sum(int $x, int $y) {
     $x = 5.5;
    return $x + $y;
}

$sum = sum(2, 3); return int(8.5)

10:15 - Strict Types
Ràng buộc kiểu dữ liệu nghiệm ngặt hơn tức là ném lỗi nếu vượt qua các type khác
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

11:12 - Type Casting (Ép kiểu dữ liệu)
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
Line 3 
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
$x = 10;
$y = 0;
var_dump($x / $y); reslut => error
var_dump(fdiv($x / $y)); result => float(INF)

$x = 10.5;
$y = 2.9;
var_dump($x % $y);  result => 0;
var_dump(fmod($x % $y)); => float(1.80000000000003)

04:35 - Assignment Operators (= += -= *= /= %= **=)
07:12 - String Operators (. .=)
07:39 - Comparison Operators (== === #= <> #=== < > ...    ?? ?:)

00:00 - Intro
00:11 - Error Control Operator (@)
- Loại bỏ bất kỳ lỗi nào từ biểu thức đó và các lỗi nó loại bỏ chủ yếu phụ
thuộc vào cách bạn cấu hình xử lý lỗi của mình trong php
vd:
$x = file('foo.txt'); error file(foo.txt) ko tồn tại trong folder
để khắc phục vấn đề trên sử dụng
$x = @file('foo.txt'); lỗi sẽ biến mất (ko nên sử dụng trừ khi có trường hợp sử dụng thực sử tốt)
trong một số trường hợp muốn chặn một số cuộc gọi api hoặc thứ


01:26 - Increment / Decrement Operators (++ --)
03:17 - Logical Operators (&& || !)
04:52 - Logical Operators (and or xor)
$x = true;
$y = false;
$z = $x and $y; 
vả_dump($z) => true (vì toán tử = sẽ độ ưu tiên cao hơn and)
05:45 - Logical Operators - Short Circuiting
07:55 - Bitwise Operators (& | ^ ~ << >>)
$x = 6;
$y = 3;
// 110
// &
// 011
// ---
// 010 = 2
var_dump($x | $y);
12:42 - Array Operators (+ == === != !==)
15:32 - Execution Operator, Type Operator, & Nullsafe Operator

PHP Operator Precedence & Associativity
Thứ tự ưu tiên nếu độ ưu tiên bằng nhau thì thực hiện từ phải sang trái
(đi từ trái sang phải hay p sang trái phụ thuộc vào cột Associativity)
https://www.php.net/manual/en/language.operators.precedence.php



Control Structures in PHP - Conditional Statements - if/else 
If conditional statements
Else Conditional Statements
Alternative Syntax


PHP Loops Tutorial - Break & Continue Statements 
00:15 - While loop
01:05 - Infinite loops
01:32 - Break statement & use-case of an infinite loop
02:05 - Break out of multiple levels of nested loops
02:31 - Continue statement
03:32 - Alternative while loop syntax
03:47 - Do-While loop
04:26 - For loop
05:07 - Multiple expressions within for loop
05:48 - Iterate over strings
06:09 - Iterate over arrays
06:23 - Performance concerns
07:20 - Foreach loop
08:38 - Overwriting array elements using assignment by reference
09:15 - Something to be aware of - variable within the foreach loop is not destroyed
10:30 - Iterate over associative arrays
11:48 - Alternative foreach & for loop syntax

PHP Match Expression - Match vs Switch - Full PHP 8 Tutorial
- Sự khác nhau giữa biểu thức switch và match
1: match là một biểu thức() và nó được ước tính thành một giá trị và do đó  nó có thể gán thành một biến
khi nhảy vào một trường hợp nó sẽ ko chạy các trường hợp khác nên ko cần câu lệnh break
<?php
$food = 'cake';

$return_value = match ($food) {
    'apple' => 'This food is an apple',
    'bar','name' => 'This food is a bar',
    'cake' => 'This food is a cake',
     default => 'Unknown',
};

var_dump($return_value);
?>

2: Trong switch cần có câu lệnh ngắt để tránh một số điều bất ngờ switch só sánh lỏng lẻo còn match so sanh chặt chẽ


How To Include Files In PHP - Include and Require

include sẽ sinh ra cảnh báo nhưng vẫn in ra giá trị
require sẽ sinh ra lỗi và ko in ra giá trị

00:00 - Include & Require
00:42 - Syntax
01:00 - Difference between include & require
01:30 - How are files located/loaded
02:13 - Difference between include_once, require_once & include, require
02:35 - Example usage of require_once with the variable being overwritten if the file is included more than once
04:13 - Bad practice
04:48 - Return value of include & using return within the included file
05:27 - Using include within HTML for code re-usability
06:59 - Including file into a string using output control functions (storing HTML of the included file in a string instead of printing it)
Đưa nội dung của một tệp vào một chuỗi
ob_start();
include './file.php';
$nav = ob_get_clean();

$nav = str_replace('About', 'About Us', $nav);

var_dump($nav);
echo $nav;


How To Create Functions In PHP - Functions Tutorial
00:00 - Functions
00:36 - Creating functions
01:10 - Return values from functions
01:52 - Where to define functions
02:14 - Declaring functions conditionally
02:49 - Inner functions
foo();
bar(); //lỗi function undefined nếu commnet foo() lại

function foo() {
   echo 'Foo';
   function bar() {
	echo 'Bar';
   }
}

03:47 - Functions with the same name
Hàm cùng tên
foo();
bar(); //lỗi function ko thể truy cập foo()  (2)

function foo() {
   echo 'Foo';
   function bar() {
	echo 'Bar';
	
	function foo() { 
		echo 'Foo2';
	}
   }
}

04:21 - Return types & strict types
- return 
declare(strict_types=1);

function foo(): int {
   return 1;
}

06:13 - Nullable types
declare(strict_types=1);

function foo(): ?int {
   return null;
}


06:43 - Union types (type hinting multiple types)
declare(strict_types=1);

function fooo(): int|float|array {
   return [1.5];
}

declare(strict_types=1);

function fooo(): mixed {
   return [1.5];
}

mixed là một kiểu đặc biệt trong PHP, cho phép hàm trả về một giá trị có thể là bất kỳ kiểu nào.

07:05 - Mixed type

PHP Function Parameters - Named Arguments - Variadic Functions & Unpacking
RESOURCES
Coercive typing with union types - https://www.php.net/manual/en/languag...
Named arguments - https://www.php.net/manual/en/functio...
RFC - https://wiki.php.net/rfc/named_params

00:00 - Function parameters
function foo($x, $y) {	 // tham số 
    return $x * $y;
}

echo foo(5, 10) // đối số đang đc thông qua

00:19 - Define function parameters

00:45 - Parameters vs arguments
01:04 - Type hinting
declare(strict_types=1);
01:39 - Union types
02:25 - Default values
//Giá trị có đi default phải ở cuối ko được đứng trước tham số bắt buộc
function foo(int|float $x, int|float $y = 1): int|float {
   if($x % 2 === 0) {
	$x / 2;
    }
    return $x * $y;

}

03:01 - Passing arguments by value vs by reference
declare(strict_types=1);

function foo(int|float $x, int|float $y): int|float {
   if($x % 2 === 0) {
	$x / 2;
    }
    return $x * $y;

}

$a = 6.0;
$b = 7;

echo foo($a, $b); -> 21
var_dump($a, $b); -> float(6), int(7)
// dùng tham chiếu
declare(strict_types=1);
function foo(int|float &$x, int|float $y): int|float {
   if($x % 2 === 0) {
	$x / 2;
    }
    return $x * $y;

}

$a = 6.0;
$b = 7;

echo foo($a, $b); -> 21
var_dump($a, $b); -> float(3), int(7)
04:00 - Variadic functions - splat operator - capture passed arguments
declare(strict_types=1);
function sum(int|float $x, int|float $y, ...$number): int|float {
    return $x + $y;//
    return $x + $y + array_sum($number);
}


echo foo($a, $b, 50);
06:47 - Argument unpacking with splat (elipsis / three dot) operator
declare(strict_types=1);
function sum(int|float $x, int|float $y, int|float ...$number): int|float {
    return $x + $y;//
    return $x + $y + array_sum($number);
}

$number = [4,4,5,4,6.4];
echo foo($a, $b, ...$number);
07:39 - PHP8 named arguments
declare(strict_types=1);
function foo(int $x, int $y): int {
   if($x % 2 === 0) {
	$x / $y;
    }
    return $x;

}

$a = 6;
$b = 3;

echo foo(y: $y, x: $x);

PHP Variable Scopes - Static Variables
00:00 - Variable scope
00:25 - Global scope
$x = 5;
include('script1.php);

echo $x;
01:00 - Local scope
$x = 5;

function foo() {
    echo $x;
}
result -> warning: undefined $x in ...

function foo() {
    $x = 1;
    echo $x;
}

function foo($x) {
    echo $x;
}


01:41 - Using global keyword to access variables in the global scope
function foo() {
    global $x;
    $x = 10 -> có thể thay đổi giá trị của biến global
 
    echo $x;
}

function foo() {
    echo $GLOBALS['x'];
}

02:12 - How are global variables stored & GLOBALS superglobal
03:13 - Static variables
- Biến tĩnh là biến thông thường có phạm vi cục bộ sự khác biệt là biến thông thường
bị hủy bên ngoài ranh giới phạm vi trong khi biến tĩnh không bị hủy và nó vẫn giữ nguyên giá trị của nó

vd: 

function getValue() {
    
    $value = someVeryExpensiveFuntion();
  
    return $value;

}

function someVeryExpensiveFuntion() {
   sleep(2);
   echo 'processing';
   return 10;
}

echo getValue() . '<br/>';
echo getValue() . '<br/>';
echo getValue() . '<br/>';
resutl : 
processing10
processing10
processing10

//static
function getValue() {
    static $value = null;

    if($value === null) {
        $value = someVeryExpensiveFuntion();
    }
    return $value;

}

function someVeryExpensiveFuntion() {
   sleep(2);
   echo 'processing';
   return 10;
}

echo getValue() . '<br/>'; 
echo getValue() . '<br/>';
echo getValue() . '<br/>';

processing10
10
10


Variable, Anonymous, Callable, Closure & Arrow Functions In PHP
00:00 - Intro
00:20 - Variable functions
function sum(int|float ...$numbers): int|float {
   return array_sum($numbers);
}
$x = 'sum';

if(is_callable($x)) { //kiểm tra hàm có gọi được hay ko
   echo $x(1, 2, 3, 4);
} else {
   echo 'Not callable';
}



01:49 - Anonymous functions
- Hàm ẩn danh hay lamda là các hàm ko có tên nên trong 
$x = 1;
$sum = function (int|float ...$numbers): int|float use($x) { //use($x) sao chép biến $x
echo $x;
   return array_sum($numbers);
}

02:38 - Closures & accessing variables from the parent scope
03:53 - Callable data type & callback functions
$array = [1,2,3,4];
$array2 = array_map(function($element) {
   return $element * 2;
}, $array);

$x = function($element) {
    return $element * 2;
}

function foo($element) {
    return $element * 2;
}

$array2 = array_map($x, $array);
or
$array2 = array_map('foo', $array);

vd:
$sum = function (callable $callback, int|float ...$numbers): int|float { 
   return $callback(array_sum($numbers));
}

function foo($element) {
    return $element * 2;
}

echo $sum('foo', 1, 2, 3, 4);

05:41 - Closure vs callable
06:05 - Arrow functions


How To Work With Dates & Time Zones
RESOURCES
Date Formats - https://www.php.net/manual/en/datetim...
Time Zones - https://www.php.net/manual/en/timezon...
Relative Formats - https://www.php.net/manual/en/datetim...

CHAPTERS
00:00 - Intro
00:22 - Working with Unix timestamp
01:45 - Formatting dates
03:03 - Working with time zones
04:07 - Using mktime function to get Unix timestamp value
04:31 - Parsing dates using function strtotime
05:18 - Parsing dates using function date_parse & date_parse_from_format to get more details about date


Working With File System In PHP
Docs for clearstatcache & list of affected functions - https://www.youtube.com/redirect?event=video_description&redir_token=QUFFLUhqbUF6X1VUdzdzV3c0UEsxZThhUmhJVzFFTmJTd3xBQ3Jtc0trS0k2cTQyQS1SR1hvWnM3Z1RmZnJHMkt3Wjc4VlV0VnZoZWJtNXMtWjFhbV93MFprczl5VmtEMTZPel9zWlhOQkxiQXJVMGEwZWJfUDR6T2pvNjRpTWtxdWNRWndtWXpuSFBRaEVBVkVmcThBYno3TQ&q=https%3A%2F%2Fwww.php.net%2Fmanual%2Fen%2Ffunction.clearstatcache.php&v=p7F2GgVxHc0
Docs for fopen & modes - https://www.php.net/manual/en/function.fopen.php
Filesystem functions - https://www.php.net/manual/en/ref.filesystem.php

CHAPTERS
00:00 - List of all files & directories - scandir
$dir = scandir(__DIR__);
is_dir($dir[2]);
mkdir('foo'); tao thu muc


00:44 - Check if file is a directory or a file - is_dir / is_file
00:58 - Create & delete directories - mkdir / rmdir
02:02 - Check if file or directory exists & print filesize - file_exists / filesize
02:28 - Clear cached values of functions like filesize - clearstatcache
03:30 - Open files & resource data type - fopen
04:25 - Using error control operator to suppress warnings
05:25 - Read files line by line - fgets / fclose
06:25 - Read csv files - fgetcsv
07:02 - Get file contents & store in a variable - file_get_contents
07:57 - Write content to a file - file_put_contents
08:50 - Delete, copy, rename & move files - unlink / copy / rename
09:34 - Get information about a file - pathinfo

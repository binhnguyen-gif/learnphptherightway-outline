<?php

// Strict type
declare(strict_types=1);

require 'helper.php';

// 00:25 - Chunk an array into a list of smaller chunks of arrays - array_chunk
// array_chunk(array $array, int $lenght, bool $preserveKeys = false): array
// bool $preserveKeys giá trị xác định có muốn giữ lại key hay không khi chia thanh cac mang nhor
$chunk = [1, 2, 4, 5, 6, 7, 8, 9, 10];

$array_chunk = array_chunk($chunk, 2);

// printPre($array_chunk);
// 01:15 - Combine arrays to form a new array - array_combine
// array_combine(array $key,array $values) : array
$key = [1, 2, 0, 4, 5];
$values = ['a', 'b', 'c', 'd', 'e'];

$array_cb = array_combine($key, $values);

// printPre(array_combine($key, $values));
// 01:58 - Filter array - array_filter
// array_filter(array $array, callable|null $callback = null, int $mode = 0): array;
//mode : Cờ xác định đối số nào được gửi tới lệnh gọi lại:
//ARRAY_FILTER_USE_KEY - chuyển khóa làm đối số duy nhất cho cuộc gọi lại thay vì giá trị
//ARRAY_FILTER_USE_BOTH - chuyển cả giá trị và khóa làm đối số cho lệnh gọi lại thay vì giá trị
$filters_array = [1, 2, 4, 5, 6, 12, 7, 8, 9, 10];

$filter = array_filter($filters_array, fn($number) => $number % 2 === 0);

$filter = array_filter($filters_array, fn($number, $value) => $number % 2 === 0, ARRAY_FILTER_USE_BOTH);
// Trả về key là giá trị thỏa mãn % 2 === 0
$filter = array_filter($filters_array, fn($number) => $number % 2 === 0, ARRAY_FILTER_USE_KEY);

// printPre($filter);
// 03:10 - Re-index array - array_values
$event = array_values($filter);
// printPre($event);
// 03:30 - Filter array with no callback - array_filter
// 03:49 - Get keys of an array - array_keys
$event = array_keys($filter);
// printPre($event);
// 04:33 - Iterate over array elements & apply callback - array_map
$array1 = ['a' => 1, 'b' => 2, 'c' => 3];
$array2 = ['d' => 4, 'e' => 5, 'f' => 6];
// Nếu chỉ có 1 mảng thì nó giữ nguyên key của mảng nếu từ 2 mảng thì nó sẽ lặp chỉ mục bằng số
//array_map(callable|null $callback, array $array, array ...$arrays): array;
$array = array_map(fn($number1, $number2) => $number1 * $number2, $array1, $array2);
printPre($array);

// 06:10 - Merge arrays - array_merge
//array_merge(array ...$arrays);
$array1 = [1, 2, 3];
$array2 = [4, 5, 6];
$array3 = [7, 8, 9];
$merged = array_merge($array1, $array2, $array3);
//result
//Array
//(
//    [0] => 1
//    [1] => 2
//    [2] => 3
//    [a] => 4
//    [b] => 9
//    [c] => 6
//    [3] => 7
//    [4] => 8
//)

// 07:10 - Reduce array to a single value - array_reduce
//array_reduce(array $array, callable $callback, mixed $initialValue = null): mixed;

$invoiceItems = [
    ['price' => 9.99, 'qty' => 1, 'Item1'],
    ['price' => 29.99, 'qty' => 3, 'Item2'],
    ['price' => 19.99, 'qty' => 3, 'Item3'],
    ['price' => 59.99, 'qty' => 3, 'Item4'],
    ['price' => 39.99, 'qty' => 7, 'Item5'],
];

$total = array_reduce($invoiceItems, fn($sum, $item) => $sum + $item['price'], 0);

printPre($total);

// 08:35 - Search for a value in an array & find its key - array_search

//array_search(mixed $needle, array $haystack, bool $strict = false): int|string|false
//tham so thứ 3 là có muốn so sánh nghiệm ngặt hay không
$array = ['a', 1, 'c', 'D', 'E', 'ab', 'bc', 'cd', '1', 'd'];

$search_value = array_search('1', $array, false);

if ($search_value === false) {
    echo 'Letter not found';
}

printPre($search_value);

// 09:56 - Alternative way to check if an item exists in the array - in_array
// 10:23 - Find the difference between arrays by comparing values - array_diff
// 11:01 - Find the difference between arrays by comparing both keys & values - array_diff_assoc
// 11:33 - Find the difference between arrays by comparing keys - array_diff_keys
// 11:46 - Sort array by values - asort
// 12:08 - Sort array by keys - ksort
// 12:28 - Sort array by using custom function - usort
// Trả về 0 nếu a = b, trả về -1 khi a < b trả về 1 nếu a > b
$array = ['a' => 4, 'c' => 5, 'd' => 3];

usort($array, fn($a, $b) => $a <=> $b);

printPre($array);

// 13:19 - Array destructuring

$array = [1, 2, [3, 4]];

[$a, $b, [$c, $d]] = $array;

echo $a . ', ' . $b . ', ' . $c . ', ' .$d;
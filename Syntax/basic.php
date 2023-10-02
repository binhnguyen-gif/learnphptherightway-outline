<?php

// Strict type
declare(strict_types=1);

function sum(float $x, float $y) {
	return $x + $y;
}

$sum =  sum(4, 4);
$x = 1;
$y = 2;
// 
// Heredoc
$text = <<<TEXT
Line 1 $x
Line 2 $y
Line 3
$sum
TEXT;

echo nl2br($text);

$programingLanguages = ['PHP', 'Java', 'Python'];
$programingLanguages[] = 'C++';

echo '<br>';

var_dump($programingLanguages);
// echo '<br>';
// $x = 10.5;	
// $y = 2.9;
// var_dump($x % $y); 
echo '<br>';

$x = true;
$y = false;
$z = $x and $y;

var_dump($z); 

echo '<br>';

$food = 'cake';

$return_value = match ($food) {
    'apple' => 'This food is an apple',
    'bar','name' => 'This food is a bar',
    'cake' => 'This food is a cake',
     default => 'Unknown',
};

var_dump($return_value);


// $sum = function (callable $callback, int|float ...$numbers): int|float { 
//    return $callback(array_sum($numbers));
// };

// function foo($element) {
//     return $element * 2;
// }

// echo $sum('foo', 1, 2, 3, 4);
// echo __DIR__;
// echo '<br>';
// $dir = scandir(__DIR__);
// mkdir('foo');
// var_dump(is_dir($dir[2]));
// var_dump(filesize('basic.php'));

// date_default_timezone_set('UTC');

// date_default_timezone_get();
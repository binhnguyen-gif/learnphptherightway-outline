<?php

if (! file_exists('foo1.csv')) {
    echo 'File not found';

    return;
}

$file = fopen('foo1.csv', 'r');

//while(($line = fgets($file)) !== false) {
//    echo $line . '</br>';
//}

while(($line = fgetcsv($file)) !== false) {
    print_r($line);
}

fclose($file);

//var_dump($file);
echo '</br>';
$content = file_get_contents('foo.txt', offset: 3, length: 2);
echo $content;
echo '</br>';
var_dump($content);

file_put_contents('foo.txt', 'hello');
// Them vao sau ma khong bi ghi de nhu tren khi su dung tham so thu 3
file_put_contents('foo.txt', 'word', FILE_APPEND);
//unlink('foo.txt');
copy('foo.txt', 'content.txt');
rename('foo.txt', 'test.txt');

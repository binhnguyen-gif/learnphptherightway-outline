<?php
//lần đầu trước khi gọi file_put_contents('foo.txt', 'hello world nguyen n');
//nó chỉ in ra giá trị được lưu trong bộ nhớ đệm trước đó
if (file_exists('foo.txt')) {
    echo filesize('foo.txt');
    echo '<br>';
    file_put_contents('foo.txt', 'hello world nguyen n');

//    echo file_get_contents('foo.txt');
    clearstatcache(); //xóa bộ nhớ đệm
    echo '<br>';
    echo filesize('foo.txt');
} else {
    echo 'File not found';
}
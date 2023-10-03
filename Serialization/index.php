<?php

//00:00 - Serialization
echo serialize(true).PHP_EOL;
echo serialize(1).PHP_EOL;
echo serialize(2.5).PHP_EOL;
echo serialize('hello world').PHP_EOL;
echo serialize([1, 2, 3]).PHP_EOL;
echo serialize(['a' => 1, 'b' => 2]).PHP_EOL;

var_dump(unserialize(serialize(['a' => 1, 'b' => 2])));
<?php 

// namespace My\App {
//   class Api {
//     public static function fetch() {
//       print __FUNCTION__ . "\n"; // outputs fetch
//       print __METHOD__ . "\n"; // outputs My\App\Api::fetch
//     }
//   }

//   Api::fetch();
// }

// namespace {
//   My\App\Api::fetch();
// }


// print dirname(__FILE__)
// $a = 1;
// echo ++$a;
// echo $a;
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;
echo $root;
?>
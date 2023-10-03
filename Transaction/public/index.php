<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('TRANSACTION_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEW_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . 'app.php';
require APP_PATH . 'helper.php';

$files = getTransactionFiles(TRANSACTION_PATH);
//var_dump($files);
$transactions = [];

foreach ($files as $file) {
    $transactions = array_merge($transactions, getTransaction($file, 'extractTransactions'));
}

//var_dump($transactions);

$totals = calculateTotals($transactions);

print_r($totals);


<?php

function getTransactionFiles(string $dirPath): array
{
    $files = [];

    foreach (scandir($dirPath) as $file) {
        if (is_dir($file)) {
            continue;
        }

        $files[] = $dirPath.$file;
    }

    return $files;
}

function getTransaction($filePath, ?callable $transactionHandler = null): array
{
    if (!file_exists($filePath)) {
        trigger_error('File'.$filePath.'not found', E_USER_ERROR);
    }

    $file = fopen($filePath, 'r');

    fgetcsv($file);

    $transactions = [];

    while (($transaction = fgetcsv($file)) !== false) {
        $transactions[] = $transactionHandler($transaction);
    }
    return $transactions;
}

function extractTransactions($transaction): array
{
    [$date, $checkNumber, $description, $amount] = $transaction;

    $amount = (float)str_replace(['$', ','], '', $amount);

    return [
        'date' => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount' => $amount,
    ];
}

function calculateTotals($transactions): array
{
//    printPre($transactions);
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach ($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount'];

        if ($transaction['amount'] >= 0) {
            $totals['totalIncome'] += $transaction['amount'];
        } else {
            $totals['totalExpense'] += $transaction['amount'];
        }
    }

    return $totals;
}
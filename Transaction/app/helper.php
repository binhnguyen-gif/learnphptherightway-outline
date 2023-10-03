<?php

if (!function_exists('printPre')) {
    function printPre($data): void
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
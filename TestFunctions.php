<?php

if (!function_exists('println')) {
    function println(...$outputs)
    {
        foreach ($outputs as $output) {
            if (is_array($output)) {
                print(print_r($output, true));
                print(PHP_EOL);
            } else {
                print($output . PHP_EOL);
            }
        }
    }
}

if (!function_exists('dd')) {
    function dd(...$outputs)
    {
        println(...$outputs);
        exit();
    }
}
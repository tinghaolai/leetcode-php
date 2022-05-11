<?php

if (!function_exists('println')) {
    function println(...$outputs)
    {
        foreach ($outputs as $output) {
            if (is_array($output)) {
                print(print_r($output, true));
                print(PHP_EOL);
            } else {
                if ($output === true) {
                    $output = 'true';
                }

                if ($output === false) {
                    $output = 'false';
                }

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

if(!function_exists('readline')) {
    function readline($prompt = null){
        if($prompt){
            echo $prompt;
        }

        $fp = fopen('php://stdin', 'r');
        $line = rtrim(fgets($fp, 1024));
        return $line;
    }
}
<?php

if (!function_exists('println')) {
    function println(...$outputs)
    {
        foreach ($outputs as $output) {
            if (is_array($output)) {
                print(print_r($output, true));
                print(PHP_EOL);
            } else if (is_object($output)) {
                print_r($output);
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

function binaryCeilSearch($array, $target)
{
    $start = 0;
    $end = count($array) - 1;
    if ($target > $array[$end]) {
        return -1;
    }

    if ($target < $array[$start]) {
        return $array[$start];
    }

    while ($start <= $end) {
        $middle = intdiv($start + $end, 2);
        if ($array[$middle] === $target) {
            return $target;
        }

        if ($array[$middle] < $target) {
            $start = $middle + 1;
        } else {
            $ceil = $array[$middle];
            $end = $middle - 1;
        }
    }

    return $ceil;
}

function binaryCeilSearch_second_solution($array, $target)
{
    $start = 0;
    $end = count($array) - 1;
    if ($target > $array[$end]) {
        return -1;
    }

    if ($target <= $array[$start]) {
        return $array[$start];
    }

    while (true) {
        $middle = intdiv($start + $end, 2);
        if ($array[$middle] === $target) {
            return $target;
        }

        if ($array[$middle] < $target) {
            $start = $middle;
        } else {
            $end = $middle;
        }

        if ($end - $start === 1) {
            if ($array[$start] >= $target) {
                return $array[$start];
            }

            return $array[$end];
        }
    }

    function isPrime($num)
    {
        if (!is_int($num)) {
            return false;
        }

        if ($num <= 1) {
            return false;
        }

        if ($num == 2 || $num == 3) {
            return true;
        }

        if ($num % 2 == 0 || $num % 3 == 0) {
            return false;
        }

        for ($i = 5; $i <= sqrt($num); $i += 6) {
            if ($num % $i == 0 || $num % ($i + 2) == 0) {
                return false;
            }
        }

        return true;
    }
}
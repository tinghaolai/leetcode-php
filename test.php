<?php

require 'TestFunctions.php';

if (isset($argv[1])) {
    $problemNumber = $argv[1];
} else {
    $problemNumber = readline('enter problem number: ');
}

while (strlen($problemNumber) < 4) {
    $problemNumber = '0' . $problemNumber;
}

$require = null;

$folders = ['.'];
findFolders();

foreach ($folders as $folder) {
    foreach(glob($folder . '/*.*') as $file) {
        $pattern = '/.*' . $problemNumber .'.*/';
        if (preg_match($pattern, $file)) {
            if (@fopen($file, 'r')) {
                $require = $file;
                break;
            }
        };
    }
}

function findFolders($path = '')
{
    $dirs = array_filter(glob($path . '*'), 'is_dir');
    foreach ($dirs as $dir) {
        $GLOBALS['folders'][] = $dir;
        findFolders($path . $dir . '/');
    }
}

if (!$require) {
    dd('Problem not found!');
}

require $require;

$solution = new Solution();
if (method_exists($solution,'test')) {
    dd('--test solution--', $solution->test());
} else {
    $firstFunction = get_class_methods($solution)[0];
    $ref = new ReflectionMethod(Solution::class, $firstFunction);
    dd(
        '--test function not found--',
        'function: ' . $firstFunction,
        $ref->getDocComment()
//        ,
//        $solution->$firstFunction()
// todo, generate rand input by reading regex of comment, ex: int generates rand number, int[] generates rand numbers of an array.
    );
}

<?php

// php test.php <problem num>
require $argv[1] . '.php';

print(print_r((new Solution())->test(), true));

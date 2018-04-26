<?php

function OAuth($name, $age, $callback = false)
{
    echo 'name:' . $name . '<br/>';
    echo 'age:' . $age . '<br/>';
    if ($callback) {
        $test1 = 'test1';
        call_user_func($callback, $test1);
    }
}

$test2 = 'test2';
OAuth('kamly', '21', function ($test) use ($test2) {
    echo 'test1:' . $test . '<br/>';
    echo 'test1:' . $test2 . '<br/>';
});

/*
    name:kamly
    age:21
    test1:test1
    test1:test2
 */







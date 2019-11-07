<?php
$arr = ['AAAA', 'BBBB', 'CCCC'];

$res = array_reduce($arr, function($carry, $item){
    var_dump($carry);
    return function () use($carry, $item) {
        if (is_null($carry)) {
            return 'Carry IS NULL' . $item;
        }
        if ($carry instanceof \Closure) {
            return $carry() . $item;
        }
    };
});
var_dump($res());

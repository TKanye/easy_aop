--TEST--
EasyAop::add_advice test : arguments passing by reference
--SKIPIF--
<?php
if (!extension_loaded('easy_aop')) {
    echo 'skip';
}
?>
--FILE--
<?php
function test(&$a) {
    $a++;
}

EasyAop::add_advice([
    'after@test',
    'before@test',
], function($joinpoint, $args, $ret) {
    $args['a']++;
});

$a = 1;
test($a);
var_dump($a);
?>
--EXPECT--
int(4)
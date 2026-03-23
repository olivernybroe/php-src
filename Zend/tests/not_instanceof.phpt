--TEST--
!instanceof operator
--FILE--
<?php

class Base {}
class Child extends Base {}
interface Iface {}
class Impl implements Iface {}

$base = new Base();
$child = new Child();
$impl = new Impl();

var_dump($base !instanceof Base);
var_dump($child !instanceof Child);
var_dump($child !instanceof Base);
var_dump($impl !instanceof Iface);

var_dump($base !instanceof Child);
var_dump($base !instanceof Iface);

var_dump($base ! instanceof Base);

var_dump($base !
instanceof Child);

var_dump(42 !instanceof Base);
var_dump("hello" !instanceof Base);
var_dump(null !instanceof Base);

var_dump(!$base !instanceof Child);
var_dump(!$base !instanceof Base);

if ($base !instanceof Child) {
    echo "base is not a Child\n";
}

if (!($base !instanceof Base)) {
    echo "base is a Base\n";
}

var_dump($base !instanceof Child && $impl !instanceof Iface);
var_dump($base !instanceof Child || $impl !instanceof Iface);

try {
    assert($base !instanceof Base);
} catch (\AssertionError $e) {
    echo $e->getMessage() . "\n";
}

?>
--EXPECT--
bool(false)
bool(false)
bool(false)
bool(false)
bool(true)
bool(true)
bool(false)
bool(true)
bool(true)
bool(true)
bool(true)
bool(false)
bool(true)
base is not a Child
base is a Base
bool(false)
bool(true)
assert($base !instanceof Base)

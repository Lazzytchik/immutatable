<?php

include 'FloatInterface.php';
include 'Money.php';
include 'MoneyAction.php';
include 'MoneyAddAction.php';
include 'MoneySubtractAction.php';
include 'MoneyExpression.php';

function Money($value){
    return Money::create($value);
}

$a = Money(10.0) ->add (Money(20.0)) ->subtract (Money(5.0));
$b = Money(40.0) ->subtract ($a -> subtract(Money(3.0)));
echo $a->asFloat() . PHP_EOL; // 25.0
echo $a->describe() . PHP_EOL; // ((10 + 20) – 5)
echo $b->asFloat() . PHP_EOL; // 18.0
echo $b->describe() . PHP_EOL; // (40.0 – (((10 + 20) - 5) – 3))



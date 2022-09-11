<?php

class MoneyMultiplyAction implements MoneyAction
{

    public function execute(float $stock, float $change): float
    {
        return $stock * $change;
    }

    public static function operator(): string
    {
        return '*';
    }
}
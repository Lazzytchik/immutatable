<?php

interface MoneyAction
{
    public function execute(float $stock, float $change) : float;

    public static function operator() : string;
}
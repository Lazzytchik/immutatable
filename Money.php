<?php


use JetBrains\PhpStorm\Pure;

class Money implements FloatInterface {

    private float $_value;

    protected function __construct(float $value)
    {
        $this->_value = $value;
    }

    #[Pure] public static function create($value): \Money
    {
        return new static($value);
    }

    #[Pure] public function add(FloatInterface $value): MoneyExpression
    {
        return MoneyExpression::create($this, $value, new MoneyAddAction());
    }

    #[Pure] public function subtract(FloatInterface $value): MoneyExpression
    {
        return MoneyExpression::create($this, $value, new MoneySubtractAction());
    }

    public function asFloat() : float
    {
        return $this->_value;
    }

    public function describe() : string
    {
        return (string)$this->_value;
    }


}
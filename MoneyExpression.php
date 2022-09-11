<?php

use JetBrains\PhpStorm\Pure;

class MoneyExpression implements FloatInterface
{
    protected FloatInterface $_stock;
    protected FloatInterface $_change;
    protected MoneyAction $_action;

    protected function __construct(FloatInterface $stock, FloatInterface $change, MoneyAction $action)
    {
        $this->_stock = $stock;
        $this->_change = $change;
        $this->_action = $action;
    }

    #[Pure] public static function create(FloatInterface $stock, FloatInterface $change, MoneyAction $action): \MoneyExpression
    {
        return new static($stock, $change, $action);
    }

    #[Pure] public function add(FloatInterface $value): MoneyExpression
    {
        return new static($this, $value, new MoneyAddAction());
    }

    #[Pure] public function subtract(FloatInterface $value): MoneyExpression
    {
        return new static($this, $value, new MoneySubtractAction());
    }

    public function asFloat(): float
    {
        return $this->_action->execute($this->_stock->asFloat(), $this->_change->asFloat());
    }

    public function describe() : string
    {
        return '('.$this->_stock->describe().' '.$this->_action::operator().' '.$this->_change->describe().')';
    }
}
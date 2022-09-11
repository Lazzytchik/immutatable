<?php


use JetBrains\PhpStorm\Pure;

class Money implements FloatInterface {

    private float $_value;
    private ?MoneyAction $_action;
    private ?Money $_last;

    protected function __construct(float $value, Money $last = null, MoneyAction $action = null)
    {
        $this->_value = $value;
        $this->_last = $last;
        $this->_action = $action;
    }

    #[Pure] public static function create($value): \Money
    {
        return new static($value);
    }

    #[Pure] public function add(Money $value): \Money
    {
        return new static($value->_value, $this, new MoneyAddAction());
    }

    #[Pure] public function subtract(Money $value): \Money
    {
        return new static($value->_value, $this, new MoneySubtractAction());
    }

    public function asFloat() : float
    {
        if ($this->_last === null){
            return $this->_value;
        }
        return $this->_action->execute($this->_last->asFloat(), $this->_value);
    }

    public function describe() : string
    {
        if ($this->_last === null){
            return $this->_value;
        }
        return '('.$this->_last->describe().' '.$this->_action::operator().' '.$this->_value.')';
    }


}
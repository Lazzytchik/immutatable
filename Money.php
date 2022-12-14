<?php


class Money implements FloatInterface, StringInterface {

    private float $_value;

    protected function __construct(float $value)
    {
        $this->_value = $value;
    }

    /**
     * Makes Money instance
     *
     * @param $value
     *
     * @return Money
     */
    public static function create($value): \Money
    {
        return new static($value);
    }

    /**
     * Adds Money into a chain
     *
     * @param FloatInterface $value
     *
     * @return MoneyExpression
     */
    public function add(FloatInterface $value): MoneyExpression
    {
        return MoneyExpression::create($this, $value, new MoneyAddAction());
    }

    /**
     * Multiply current amount of money
     *
     * @param FloatInterface $value
     *
     * @return MoneyExpression
     */
    public function multiply(FloatInterface $value): MoneyExpression
    {
        return MoneyExpression::create($this, $value, new MoneyMultiplyAction());
    }

    /**
     * Divide the current Money.
     *
     * @param FloatInterface $value
     *
     * @return MoneyExpression
     */
    public function divide(FloatInterface $value): MoneyExpression
    {
        return MoneyExpression::create($this, $value, new MoneyDivideAction());
    }

    /**
     * Subtract Money from a chain
     *
     * @param FloatInterface $value
     *
     * @return MoneyExpression
     */
    public function subtract(FloatInterface $value): MoneyExpression
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
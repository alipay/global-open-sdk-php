<?php

class OrderInfo
{
    public $orderAmount;

    /**
     * @return mixed
     */
    public function getOrderAmount()
    {
        return $this->orderAmount;
    }

    /**
     * @param mixed $orderAmount
     */
    public function setOrderAmount($orderAmount): void
    {
        $this->orderAmount = $orderAmount;
    }



}
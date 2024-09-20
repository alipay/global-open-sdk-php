<?php

namespace Model;

class SettlementDetail
{
    public $settleTo;
    public $settlementAmount;

    /**
     * @return mixed
     */
    public function getSettleTo()
    {
        return $this->settleTo;
    }

    /**
     * @param mixed $settleTo
     */
    public function setSettleTo($settleTo): void
    {
        $this->settleTo = $settleTo;
    }

    /**
     * @return mixed
     */
    public function getSettlementAmount()
    {
        return $this->settlementAmount;
    }

    /**
     * @param mixed $settlementAmount
     */
    public function setSettlementAmount($settlementAmount): void
    {
        $this->settlementAmount = $settlementAmount;
    }



}
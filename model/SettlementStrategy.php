<?php

namespace Model;
class SettlementStrategy
{

    public $settlementCurrency;

    /**
     * @return mixed
     */
    public function getSettlementCurrency()
    {
        return $this->settlementCurrency;
    }

    /**
     * @param mixed $settlementCurrency
     */
    public function setSettlementCurrency($settlementCurrency)
    {
        $this->settlementCurrency = $settlementCurrency;
    }


}

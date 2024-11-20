<?php

namespace Model;

class SettlementInfo
{
    public $settlementCurrency;
    public $settlementBankAccount;

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

    /**
     * @return mixed
     */
    public function getSettlementBankAccount()
    {
        return $this->settlementBankAccount;
    }

    /**
     * @param mixed $settlementBankAccount
     */
    public function setSettlementBankAccount($settlementBankAccount) 
    {
        $this->settlementBankAccount = $settlementBankAccount;
    }


}
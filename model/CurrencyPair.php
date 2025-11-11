<?php

namespace Model;

class CurrencyPair
{
    private $sellCurrency;
    private $buyCurrency;

    /**
     * @return mixed
     */
    public function getSellCurrency()
    {
        return $this->sellCurrency;
    }

    /**
     * @param mixed $sellCurrency
     */
    public function setSellCurrency($sellCurrency)
    {
        $this->sellCurrency = $sellCurrency;
    }

    /**
     * @return mixed
     */
    public function getBuyCurrency()
    {
        return $this->buyCurrency;
    }

    /**
     * @param mixed $buyCurrency
     */
    public function setBuyCurrency($buyCurrency)
    {
        $this->buyCurrency = $buyCurrency;
    }



}
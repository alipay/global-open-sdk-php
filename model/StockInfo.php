<?php

namespace Model;

class StockInfo
{
    public $listedRegion;
    public $tickerSymbol;

    /**
     * @return mixed
     */
    public function getListedRegion()
    {
        return $this->listedRegion;
    }

    /**
     * @param mixed $listedRegion
     */
    public function setListedRegion($listedRegion) 
    {
        $this->listedRegion = $listedRegion;
    }

    /**
     * @return mixed
     */
    public function getTickerSymbol()
    {
        return $this->tickerSymbol;
    }

    /**
     * @param mixed $tickerSymbol
     */
    public function setTickerSymbol($tickerSymbol) 
    {
        $this->tickerSymbol = $tickerSymbol;
    }



}
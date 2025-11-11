<?php

namespace Request\pay;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayInquireExchangeRateRequest extends AlipayRequest
{

    private $merchantAccountId;
    private $paymentCurrency;
    private $currencyPairs;
    private $sellCurrency;
    private $buyCurrency;

    private $productCode;

    /**
     * @return mixed
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @param mixed $productCode
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }




    function __construct()
    {
        $this->setPath(AntomPathConstants::PAYMENT_INQUIRE_EXCHANGE_RATE_PATH);
    }


    /**
     * @return mixed
     */
    public function getMerchantAccountId()
    {
        return $this->merchantAccountId;
    }

    /**
     * @param mixed $merchantAccountId
     */
    public function setMerchantAccountId($merchantAccountId)
    {
        $this->merchantAccountId = $merchantAccountId;
    }

    /**
     * @return mixed
     */
    public function getPaymentCurrency()
    {
        return $this->paymentCurrency;
    }

    /**
     * @param mixed $paymentCurrency
     */
    public function setPaymentCurrency($paymentCurrency)
    {
        $this->paymentCurrency = $paymentCurrency;
    }

    /**
     * @return mixed
     */
    public function getCurrencyPairs()
    {
        return $this->currencyPairs;
    }

    /**
     * @param mixed $currencyPairs
     */
    public function setCurrencyPairs($currencyPairs)
    {
        $this->currencyPairs = $currencyPairs;
    }

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
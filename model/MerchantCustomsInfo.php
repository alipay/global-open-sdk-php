<?php

namespace Model;

class MerchantCustomsInfo
{
    public  $merchantCustomsCode;

    public  $merchantCustomsName;

    /**
     * @return mixed
     */
    public function getMerchantCustomsCode()
    {
        return $this->merchantCustomsCode;
    }

    /**
     * @param mixed $merchantCustomsCode
     */
    public function setMerchantCustomsCode($merchantCustomsCode): void
    {
        $this->merchantCustomsCode = $merchantCustomsCode;
    }

    /**
     * @return mixed
     */
    public function getMerchantCustomsName()
    {
        return $this->merchantCustomsName;
    }

    /**
     * @param mixed $merchantCustomsName
     */
    public function setMerchantCustomsName($merchantCustomsName): void
    {
        $this->merchantCustomsName = $merchantCustomsName;
    }


}
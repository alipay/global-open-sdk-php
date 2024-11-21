<?php

namespace Model;

class PspCustomerInfo
{

    public $pspName;
    public $pspCustomerId;
    public $displayCustomerId;
    public $displayCustomerName;
    public $customer2088Id;

    public $extendInfo;

    /**
     * @return mixed
     */
    public function getPspName()
    {
        return $this->pspName;
    }

    /**
     * @param mixed $pspName
     */
    public function setPspName($pspName)
    {
        $this->pspName = $pspName;
    }

    /**
     * @return mixed
     */
    public function getPspCustomerId()
    {
        return $this->pspCustomerId;
    }

    /**
     * @param mixed $pspCustomerId
     */
    public function setPspCustomerId($pspCustomerId)
    {
        $this->pspCustomerId = $pspCustomerId;
    }

    /**
     * @return mixed
     */
    public function getDisplayCustomerId()
    {
        return $this->displayCustomerId;
    }

    /**
     * @param mixed $displayCustomerId
     */
    public function setDisplayCustomerId($displayCustomerId)
    {
        $this->displayCustomerId = $displayCustomerId;
    }

    /**
     * @return mixed
     */
    public function getDisplayCustomerName()
    {
        return $this->displayCustomerName;
    }

    /**
     * @param mixed $displayCustomerName
     */
    public function setDisplayCustomerName($displayCustomerName)
    {
        $this->displayCustomerName = $displayCustomerName;
    }

    /**
     * @return mixed
     */
    public function getCustomer2088Id()
    {
        return $this->customer2088Id;
    }

    /**
     * @param mixed $customer2088Id
     */
    public function setCustomer2088Id($customer2088Id)
    {
        $this->customer2088Id = $customer2088Id;
    }

    /**
     * @return mixed
     */
    public function getExtendInfo()
    {
        return $this->extendInfo;
    }

    /**
     * @param mixed $extendInfo
     */
    public function setExtendInfo($extendInfo)
    {
        $this->extendInfo = $extendInfo;
    }


}
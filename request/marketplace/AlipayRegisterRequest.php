<?php

namespace Request\marketplace;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayRegisterRequest extends AlipayRequest
{
    public $registrationRequestId;
    public $settlementInfos;
    public $merchantInfo;
    public $paymentMethods;


    function __construct()
    {
        $this->setPath(AntomPathConstants::MARKETPLACE_REGISTER_PATH);
    }

    /**
     * @return mixed
     */
    public function getRegistrationRequestId()
    {
        return $this->registrationRequestId;
    }

    /**
     * @param mixed $registrationRequestId
     */
    public function setRegistrationRequestId($registrationRequestId): void
    {
        $this->registrationRequestId = $registrationRequestId;
    }

    /**
     * @return mixed
     */
    public function getSettlementInfos()
    {
        return $this->settlementInfos;
    }

    /**
     * @param mixed $settlementInfos
     */
    public function setSettlementInfos($settlementInfos): void
    {
        $this->settlementInfos = $settlementInfos;
    }

    /**
     * @return mixed
     */
    public function getMerchantInfo()
    {
        return $this->merchantInfo;
    }

    /**
     * @param mixed $merchantInfo
     */
    public function setMerchantInfo($merchantInfo): void
    {
        $this->merchantInfo = $merchantInfo;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethods()
    {
        return $this->paymentMethods;
    }

    /**
     * @param mixed $paymentMethods
     */
    public function setPaymentMethods($paymentMethods): void
    {
        $this->paymentMethods = $paymentMethods;
    }



}
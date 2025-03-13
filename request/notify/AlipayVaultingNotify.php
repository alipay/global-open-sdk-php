<?php

namespace Request\notify;


class AlipayVaultingNotify extends \Request\notify\AlipayNotify
{
    /**
     * The unique ID that is assigned by a merchant to identify a card vaulting request.
     */
    public  $vaultingRequestId;

    /**
     * The details about the card payment method.
     */
    public  $paymentMethodDetail;

    public  $vaultingCreateTime;

    public  $acquirerInfo;

    /**
     * @return mixed
     */
    public function getVaultingRequestId()
    {
        return $this->vaultingRequestId;
    }

    /**
     * @param mixed $vaultingRequestId
     */
    public function setVaultingRequestId($vaultingRequestId) 
    {
        $this->vaultingRequestId = $vaultingRequestId;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethodDetail()
    {
        return $this->paymentMethodDetail;
    }

    /**
     * @param mixed $paymentMethodDetail
     */
    public function setPaymentMethodDetail($paymentMethodDetail) 
    {
        $this->paymentMethodDetail = $paymentMethodDetail;
    }

    /**
     * @return mixed
     */
    public function getVaultingCreateTime()
    {
        return $this->vaultingCreateTime;
    }

    /**
     * @param mixed $vaultingCreateTime
     */
    public function setVaultingCreateTime($vaultingCreateTime) 
    {
        $this->vaultingCreateTime = $vaultingCreateTime;
    }

    /**
     * @return mixed
     */
    public function getAcquirerInfo()
    {
        return $this->acquirerInfo;
    }

    /**
     * @param mixed $acquirerInfo
     */
    public function setAcquirerInfo($acquirerInfo) 
    {
        $this->acquirerInfo = $acquirerInfo;
    }



}
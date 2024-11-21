<?php

namespace Request\vaulting;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayVaultingPaymentMethodRequest extends AlipayRequest
{
    public $vaultingRequestId;
    public $vaultingNotificationUrl;
    public $redirectUrl;
    public $merchantRegion;
    public $paymentMethodDetail;

    public $env;

    function __construct()
    {
        $this->setPath(AntomPathConstants::VAULT_PAYMENT_METHOD_PATH);
    }


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
    public function getVaultingNotificationUrl()
    {
        return $this->vaultingNotificationUrl;
    }

    /**
     * @param mixed $vaultingNotificationUrl
     */
    public function setVaultingNotificationUrl($vaultingNotificationUrl) 
    {
        $this->vaultingNotificationUrl = $vaultingNotificationUrl;
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @param mixed $redirectUrl
     */
    public function setRedirectUrl($redirectUrl) 
    {
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * @return mixed
     */
    public function getMerchantRegion()
    {
        return $this->merchantRegion;
    }

    /**
     * @param mixed $merchantRegion
     */
    public function setMerchantRegion($merchantRegion) 
    {
        $this->merchantRegion = $merchantRegion;
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
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @param mixed $env
     */
    public function setEnv($env) 
    {
        $this->env = $env;
    }




}
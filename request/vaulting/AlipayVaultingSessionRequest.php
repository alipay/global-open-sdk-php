<?php

namespace Request\vaulting;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayVaultingSessionRequest extends AlipayRequest
{
    public $paymentMethodType;
    public $vaultingRequestId;

    public $vaultingNotificationUrl;

    public $redirectUrl;

    public $merchantRegion;

    public $is3DSAuthentication;


    function __construct()
    {
        $this->setPath(AntomPathConstants::CREATE_VAULTING_SESSION_PATH);
    }

    /**
     * @return mixed
     */
    public function getIs3DSAuthentication()
    {
        return $this->is3DSAuthentication;
    }

    /**
     * @param mixed $is3DSAuthentication
     */
    public function setIs3DSAuthentication($is3DSAuthentication) 
    {
        $this->is3DSAuthentication = $is3DSAuthentication;
    }



    /**
     * @return mixed
     */
    public function getPaymentMethodType()
    {
        return $this->paymentMethodType;
    }

    /**
     * @param mixed $paymentMethodType
     */
    public function setPaymentMethodType($paymentMethodType) 
    {
        $this->paymentMethodType = $paymentMethodType;
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



}
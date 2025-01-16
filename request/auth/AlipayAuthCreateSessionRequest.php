<?php

namespace Request\auth;


class AlipayAuthCreateSessionRequest extends \Request\AlipayRequest
{


    public $productCode;
    public $agreementInfo;
    public $scopes;

    public $paymentMethod;
    public $paymentRedirectUrl;


    function __construct()
    {
        $this->setPath(\Model\AntomPathConstants::CREATE_SESSION_PATH);
        $this->setProductCode(\Model\ProductCodeType::AGREEMENT_PAYMENT);
    }



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

    /**
     * @return mixed
     */
    public function getAgreementInfo()
    {
        return $this->agreementInfo;
    }

    /**
     * @param mixed $agreementInfo
     */
    public function setAgreementInfo($agreementInfo)
    {
        $this->agreementInfo = $agreementInfo;
    }

    /**
     * @return mixed
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * @param mixed $scopes
     */
    public function setScopes($scopes)
    {
        $this->scopes = $scopes;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param mixed $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return mixed
     */
    public function getPaymentRedirectUrl()
    {
        return $this->paymentRedirectUrl;
    }

    /**
     * @param mixed $paymentRedirectUrl
     */
    public function setPaymentRedirectUrl($paymentRedirectUrl)
    {
        $this->paymentRedirectUrl = $paymentRedirectUrl;
    }



}

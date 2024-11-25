<?php

namespace Request\notify;


class AlipayPayResultNotify extends \Request\notify\AlipayNotify
{
    public $paymentRequestId;

    public $paymentId;

    public $paymentAmount;

    public $paymentCreateTime;

    public $paymentTime;

    public $customsDeclarationAmount;

    public $grossSettlementAmount;

    public $settlementQuote;

    public $pspCustomerInfo;

    public $acquirerReferenceNo;

    public $paymentResultInfo;

    public $acquirerInfo;

    public $promotionResult;

    public $paymentMethodType;

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
    public function getPromotionResult()
    {
        return $this->promotionResult;
    }

    /**
     * @param mixed $promotionResult
     */
    public function setPromotionResult($promotionResult) 
    {
        $this->promotionResult = $promotionResult;
    }



    /**
     * @return mixed
     */
    public function getPaymentRequestId()
    {
        return $this->paymentRequestId;
    }

    /**
     * @param mixed $paymentRequestId
     */
    public function setPaymentRequestId($paymentRequestId) 
    {
        $this->paymentRequestId = $paymentRequestId;
    }

    /**
     * @return mixed
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * @param mixed $paymentId
     */
    public function setPaymentId($paymentId) 
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return mixed
     */
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    /**
     * @param mixed $paymentAmount
     */
    public function setPaymentAmount($paymentAmount) 
    {
        $this->paymentAmount = $paymentAmount;
    }

    /**
     * @return mixed
     */
    public function getPaymentCreateTime()
    {
        return $this->paymentCreateTime;
    }

    /**
     * @param mixed $paymentCreateTime
     */
    public function setPaymentCreateTime($paymentCreateTime) 
    {
        $this->paymentCreateTime = $paymentCreateTime;
    }

    /**
     * @return mixed
     */
    public function getPaymentTime()
    {
        return $this->paymentTime;
    }

    /**
     * @param mixed $paymentTime
     */
    public function setPaymentTime($paymentTime) 
    {
        $this->paymentTime = $paymentTime;
    }

    /**
     * @return mixed
     */
    public function getCustomsDeclarationAmount()
    {
        return $this->customsDeclarationAmount;
    }

    /**
     * @param mixed $customsDeclarationAmount
     */
    public function setCustomsDeclarationAmount($customsDeclarationAmount) 
    {
        $this->customsDeclarationAmount = $customsDeclarationAmount;
    }

    /**
     * @return mixed
     */
    public function getGrossSettlementAmount()
    {
        return $this->grossSettlementAmount;
    }

    /**
     * @param mixed $grossSettlementAmount
     */
    public function setGrossSettlementAmount($grossSettlementAmount) 
    {
        $this->grossSettlementAmount = $grossSettlementAmount;
    }

    /**
     * @return mixed
     */
    public function getSettlementQuote()
    {
        return $this->settlementQuote;
    }

    /**
     * @param mixed $settlementQuote
     */
    public function setSettlementQuote($settlementQuote) 
    {
        $this->settlementQuote = $settlementQuote;
    }

    /**
     * @return mixed
     */
    public function getPspCustomerInfo()
    {
        return $this->pspCustomerInfo;
    }

    /**
     * @param mixed $pspCustomerInfo
     */
    public function setPspCustomerInfo($pspCustomerInfo) 
    {
        $this->pspCustomerInfo = $pspCustomerInfo;
    }

    /**
     * @return mixed
     */
    public function getAcquirerReferenceNo()
    {
        return $this->acquirerReferenceNo;
    }

    /**
     * @param mixed $acquirerReferenceNo
     */
    public function setAcquirerReferenceNo($acquirerReferenceNo) 
    {
        $this->acquirerReferenceNo = $acquirerReferenceNo;
    }

    /**
     * @return mixed
     */
    public function getPaymentResultInfo()
    {
        return $this->paymentResultInfo;
    }

    /**
     * @param mixed $paymentResultInfo
     */
    public function setPaymentResultInfo($paymentResultInfo) 
    {
        $this->paymentResultInfo = $paymentResultInfo;
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
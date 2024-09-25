<?php

namespace Request\notify;

class AlipayPayResultNotify extends AlipayNotify
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
    public function setPaymentRequestId($paymentRequestId): void
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
    public function setPaymentId($paymentId): void
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
    public function setPaymentAmount($paymentAmount): void
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
    public function setPaymentCreateTime($paymentCreateTime): void
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
    public function setPaymentTime($paymentTime): void
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
    public function setCustomsDeclarationAmount($customsDeclarationAmount): void
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
    public function setGrossSettlementAmount($grossSettlementAmount): void
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
    public function setSettlementQuote($settlementQuote): void
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
    public function setPspCustomerInfo($pspCustomerInfo): void
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
    public function setAcquirerReferenceNo($acquirerReferenceNo): void
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
    public function setPaymentResultInfo($paymentResultInfo): void
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
    public function setAcquirerInfo($acquirerInfo): void
    {
        $this->acquirerInfo = $acquirerInfo;
    }




}
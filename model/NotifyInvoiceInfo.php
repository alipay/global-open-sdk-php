<?php

namespace Model;

class NotifyInvoiceInfo
{
    public $invoiceId;
    public $invoiceStatus;
    public $originalAmount;
    public $prePaymentCreditNotesAmount;
    public $postPaymentCreditNotesAmount;
    public $adjustedAmount;

    /**
     * @return mixed
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @param mixed $invoiceId
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;
    }

    /**
     * @return mixed
     */
    public function getInvoiceStatus()
    {
        return $this->invoiceStatus;
    }

    /**
     * @param mixed $invoiceStatus
     */
    public function setInvoiceStatus($invoiceStatus)
    {
        $this->invoiceStatus = $invoiceStatus;
    }

    /**
     * @return mixed
     */
    public function getOriginalAmount()
    {
        return $this->originalAmount;
    }

    /**
     * @param mixed $originalAmount
     */
    public function setOriginalAmount($originalAmount)
    {
        $this->originalAmount = $originalAmount;
    }

    /**
     * @return mixed
     */
    public function getPrePaymentCreditNotesAmount()
    {
        return $this->prePaymentCreditNotesAmount;
    }

    /**
     * @param mixed $prePaymentCreditNotesAmount
     */
    public function setPrePaymentCreditNotesAmount($prePaymentCreditNotesAmount)
    {
        $this->prePaymentCreditNotesAmount = $prePaymentCreditNotesAmount;
    }

    /**
     * @return mixed
     */
    public function getPostPaymentCreditNotesAmount()
    {
        return $this->postPaymentCreditNotesAmount;
    }

    /**
     * @param mixed $postPaymentCreditNotesAmount
     */
    public function setPostPaymentCreditNotesAmount($postPaymentCreditNotesAmount)
    {
        $this->postPaymentCreditNotesAmount = $postPaymentCreditNotesAmount;
    }

    /**
     * @return mixed
     */
    public function getAdjustedAmount()
    {
        return $this->adjustedAmount;
    }

    /**
     * @param mixed $adjustedAmount
     */
    public function setAdjustedAmount($adjustedAmount)
    {
        $this->adjustedAmount = $adjustedAmount;
    }


}

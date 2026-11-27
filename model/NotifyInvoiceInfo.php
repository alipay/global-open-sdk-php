<?php

namespace Model;

class NotifyInvoiceInfo
{
    public $invoiceId;
    public $invoiceStatus;
    /** @var \Model\Amount|null Immutable original invoice total at finalization. */
    public $originalAmount;
    /** @var \Model\Amount|null Cumulative non-voided PRE_PAYMENT amount; reduces total. Zero when none. */
    public $prePaymentCreditNotesAmount;
    /** @var \Model\Amount|null Cumulative non-voided POST_PAYMENT amount, including processing/failed
     * refunds until void. Does not change invoice total and is not the successfully-refunded amount. */
    public $postPaymentCreditNotesAmount;
    /** @var \Model\Amount|null Current totalAmount after PRE_PAYMENT reductions; unchanged by
     * POST_PAYMENT refunds. Zero may transition the invoice to PAID. */
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

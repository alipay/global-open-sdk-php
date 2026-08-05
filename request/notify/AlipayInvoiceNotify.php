<?php

namespace Request\notify;

class AlipayInvoiceNotify extends \Request\notify\AlipayNotify
{
    public $invoiceId;
    public $customerId;
    public $reason;
    public $reasonDescription;
    public $invoiceRequestId;
    public $invoiceStatus;
    public $invoiceAmount;
    public $paymentInfo;
    public $subscription;

    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    public function setInvoiceId($invoiceId): void
    {
        $this->invoiceId = $invoiceId;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function setCustomerId($customerId): void
    {
        $this->customerId = $customerId;
    }

    public function getReason()
    {
        return $this->reason;
    }

    public function setReason($reason): void
    {
        $this->reason = $reason;
    }

    public function getReasonDescription()
    {
        return $this->reasonDescription;
    }

    public function setReasonDescription($reasonDescription): void
    {
        $this->reasonDescription = $reasonDescription;
    }

    public function getInvoiceRequestId()
    {
        return $this->invoiceRequestId;
    }

    public function setInvoiceRequestId($invoiceRequestId): void
    {
        $this->invoiceRequestId = $invoiceRequestId;
    }

    public function getInvoiceStatus()
    {
        return $this->invoiceStatus;
    }

    public function setInvoiceStatus($invoiceStatus): void
    {
        $this->invoiceStatus = $invoiceStatus;
    }

    public function getInvoiceAmount()
    {
        return $this->invoiceAmount;
    }

    public function setInvoiceAmount($invoiceAmount): void
    {
        $this->invoiceAmount = $invoiceAmount;
    }

    public function getPaymentInfo()
    {
        return $this->paymentInfo;
    }

    public function setPaymentInfo($paymentInfo): void
    {
        $this->paymentInfo = $paymentInfo;
    }

    public function getSubscription()
    {
        return $this->subscription;
    }

    public function setSubscription($subscription): void
    {
        $this->subscription = $subscription;
    }
}

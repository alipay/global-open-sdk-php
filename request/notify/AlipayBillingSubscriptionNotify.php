<?php

namespace Request\notify;

class AlipayBillingSubscriptionNotify extends \Request\notify\AlipayNotify
{
    public $merchantRequestId;
    public $eventTime;
    public $subscriptionId;
    public $invoiceId;
    public $status;
    public $reason;
    public $reasonDescription;
    public $previousStatus;
    public $fixedAmount;

    public function getMerchantRequestId()
    {
        return $this->merchantRequestId;
    }

    public function setMerchantRequestId($merchantRequestId): void
    {
        $this->merchantRequestId = $merchantRequestId;
    }

    public function getEventTime()
    {
        return $this->eventTime;
    }

    public function setEventTime($eventTime): void
    {
        $this->eventTime = $eventTime;
    }

    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    public function setSubscriptionId($subscriptionId): void
    {
        $this->subscriptionId = $subscriptionId;
    }

    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    public function setInvoiceId($invoiceId): void
    {
        $this->invoiceId = $invoiceId;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
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

    public function getPreviousStatus()
    {
        return $this->previousStatus;
    }

    public function setPreviousStatus($previousStatus): void
    {
        $this->previousStatus = $previousStatus;
    }

    public function getFixedAmount()
    {
        return $this->fixedAmount;
    }

    public function setFixedAmount($fixedAmount): void
    {
        $this->fixedAmount = $fixedAmount;
    }
}

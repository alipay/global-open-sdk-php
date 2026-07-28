<?php

namespace Request\notify;

class AlipayInvoiceNotify extends \Request\notify\AlipayNotify
{
    public $merchantRequestId;
    public $eventTime;
    public $invoiceId;
    public $subscriptionId;
    public $customerId;
    public $status;
    public $previousStatus;
    public $reason;
    public $reasonDescription;

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

    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    public function setInvoiceId($invoiceId): void
    {
        $this->invoiceId = $invoiceId;
    }

    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    public function setSubscriptionId($subscriptionId): void
    {
        $this->subscriptionId = $subscriptionId;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function setCustomerId($customerId): void
    {
        $this->customerId = $customerId;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
    }

    public function getPreviousStatus()
    {
        return $this->previousStatus;
    }

    public function setPreviousStatus($previousStatus): void
    {
        $this->previousStatus = $previousStatus;
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
}

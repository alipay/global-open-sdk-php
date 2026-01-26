<?php

namespace Model;

class RetryInfo
{
    public  $availableRetries;
    public $paymentAttempts;

    /**
     * @return mixed
     */
    public function getAvailableRetries()
    {
        return $this->availableRetries;
    }

    /**
     * @param mixed $availableRetries
     */
    public function setAvailableRetries($availableRetries): void
    {
        $this->availableRetries = $availableRetries;
    }

    /**
     * @return mixed
     */
    public function getPaymentAttempts()
    {
        return $this->paymentAttempts;
    }

    /**
     * @param mixed $paymentAttempts
     */
    public function setPaymentAttempts($paymentAttempts): void
    {
        $this->paymentAttempts = $paymentAttempts;
    }



}
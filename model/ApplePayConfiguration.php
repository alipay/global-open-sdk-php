<?php

namespace Model;

class ApplePayConfiguration
{
    public $requiredBillingContactFields;
    public $requiredShippingContactFields;
    public $buttonsBundled;

    /**
     * @return mixed
     */
    public function getRequiredBillingContactFields()
    {
        return $this->requiredBillingContactFields;
    }

    /**
     * @param mixed $requiredBillingContactFields
     */
    public function setRequiredBillingContactFields($requiredBillingContactFields): void
    {
        $this->requiredBillingContactFields = $requiredBillingContactFields;
    }

    /**
     * @return mixed
     */
    public function getRequiredShippingContactFields()
    {
        return $this->requiredShippingContactFields;
    }

    /**
     * @param mixed $requiredShippingContactFields
     */
    public function setRequiredShippingContactFields($requiredShippingContactFields): void
    {
        $this->requiredShippingContactFields = $requiredShippingContactFields;
    }

    /**
     * @return mixed
     */
    public function getButtonsBundled()
    {
        return $this->buttonsBundled;
    }

    /**
     * @param mixed $buttonsBundled
     */
    public function setButtonsBundled($buttonsBundled): void
    {
        $this->buttonsBundled = $buttonsBundled;
    }


}
<?php

namespace Model;

class ApplePayConfiguration
{
    public $requiredBillingContactFields;
    public $requiredShippingContactFields;
    public $buttonsBundled;

    public $applePayToken;


    /**
     * @return mixed
     */
    public function getApplePayToken()
    {
        return $this->applePayToken;
    }

    /**
     * @param mixed $applePayToken
     */
    public function setApplePayToken($applePayToken)
    {
        $this->applePayToken = $applePayToken;
    }



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
    public function setRequiredBillingContactFields($requiredBillingContactFields)
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
    public function setRequiredShippingContactFields($requiredShippingContactFields)
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
    public function setButtonsBundled($buttonsBundled)
    {
        $this->buttonsBundled = $buttonsBundled;
    }


}
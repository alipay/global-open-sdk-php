<?php

require_once 'request/AlipayRequest.php';

class AlipayMerchantRegistrationInfoQueryRequest extends AlipayRequest {

    public $referenceMerchantId;

    /**
     * @return mixed
     */
    public function getReferenceMerchantId()
    {
        return $this->referenceMerchantId;
    }

    /**
     * @param mixed $referenceMerchantId
     */
    public function setReferenceMerchantId($referenceMerchantId)
    {
        $this->referenceMerchantId = $referenceMerchantId;
    }



}
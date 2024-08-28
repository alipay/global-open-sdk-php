<?php

namespace Request\merchant;

use Request\AlipayRequest;

class AlipayMerchantRegistrationInfoQueryRequest extends AlipayRequest
{

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
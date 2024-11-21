<?php

namespace Request\vaulting;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayVaultingQueryRequest extends AlipayRequest
{

    public $vaultingRequestId;

    function __construct()
    {
        $this->setPath(AntomPathConstants::INQUIRE_VAULTING_PATH);
    }

    /**
     * @return mixed
     */
    public function getVaultingRequestId()
    {
        return $this->vaultingRequestId;
    }

    /**
     * @param mixed $vaultingRequestId
     */
    public function setVaultingRequestId($vaultingRequestId) 
    {
        $this->vaultingRequestId = $vaultingRequestId;
    }



}
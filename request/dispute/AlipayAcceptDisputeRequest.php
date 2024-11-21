<?php

namespace Request\dispute;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayAcceptDisputeRequest extends  AlipayRequest
{
    public $disputeId;


    function __construct()
    {
        $this->setPath(AntomPathConstants::ACCEPT_DISPUTE_PATH);
    }

    /**
     * @return mixed
     */
    public function getDisputeId()
    {
        return $this->disputeId;
    }

    /**
     * @param mixed $disputeId
     */
    public function setDisputeId($disputeId) 
    {
        $this->disputeId = $disputeId;
    }



}
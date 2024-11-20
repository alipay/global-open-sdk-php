<?php

namespace Request\dispute;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayDownloadDisputeEvidenceRequest extends AlipayRequest
{
    public $disputeId;
    public $disputeEvidenceType;


    function __construct()
    {
        $this->setPath(AntomPathConstants::DOWNLOAD_DISPUTE_EVIDENCE_PATH);
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

    /**
     * @return mixed
     */
    public function getDisputeEvidenceType()
    {
        return $this->disputeEvidenceType;
    }

    /**
     * @param mixed $disputeEvidenceType
     */
    public function setDisputeEvidenceType($disputeEvidenceType) 
    {
        $this->disputeEvidenceType = $disputeEvidenceType;
    }


}
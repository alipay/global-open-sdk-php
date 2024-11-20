<?php

namespace Request\risk;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class RiskReportRequest extends AlipayRequest
{
    public $referenceTransactionId;
    public $reportReason;
    public $riskType;
    public $riskOccurrenceTime;


    function __construct()
    {
        $this->setPath(AntomPathConstants::RISK_REPORT_PATH);
    }

    /**
     * @return mixed
     */
    public function getReferenceTransactionId()
    {
        return $this->referenceTransactionId;
    }

    /**
     * @param mixed $referenceTransactionId
     */
    public function setReferenceTransactionId($referenceTransactionId) 
    {
        $this->referenceTransactionId = $referenceTransactionId;
    }

    /**
     * @return mixed
     */
    public function getReportReason()
    {
        return $this->reportReason;
    }

    /**
     * @param mixed $reportReason
     */
    public function setReportReason($reportReason) 
    {
        $this->reportReason = $reportReason;
    }

    /**
     * @return mixed
     */
    public function getRiskType()
    {
        return $this->riskType;
    }

    /**
     * @param mixed $riskType
     */
    public function setRiskType($riskType) 
    {
        $this->riskType = $riskType;
    }

    /**
     * @return mixed
     */
    public function getRiskOccurrenceTime()
    {
        return $this->riskOccurrenceTime;
    }

    /**
     * @param mixed $riskOccurrenceTime
     */
    public function setRiskOccurrenceTime($riskOccurrenceTime) 
    {
        $this->riskOccurrenceTime = $riskOccurrenceTime;
    }



}
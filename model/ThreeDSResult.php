<?php

namespace Model;

class ThreeDSResult
{

    public $threeDSVersion;

    public $eci;

    public $cavv;

    public $dsTransactionId;

    public $xid;

    public $threeDStransactionStatusReason;

    public $challengeCancel;

    public $challenged;

    public $exemptionType;

    /**
     * @return mixed
     */
    public function getThreeDStransactionStatusReason()
    {
        return $this->threeDStransactionStatusReason;
    }

    /**
     * @param mixed $threeDStransactionStatusReason
     */
    public function setThreeDStransactionStatusReason($threeDStransactionStatusReason)
    {
        $this->threeDStransactionStatusReason = $threeDStransactionStatusReason;
    }

    /**
     * @return mixed
     */
    public function getChallengeCancel()
    {
        return $this->challengeCancel;
    }

    /**
     * @param mixed $challengeCancel
     */
    public function setChallengeCancel($challengeCancel)
    {
        $this->challengeCancel = $challengeCancel;
    }

    /**
     * @return mixed
     */
    public function getChallenged()
    {
        return $this->challenged;
    }

    /**
     * @param mixed $challenged
     */
    public function setChallenged($challenged)
    {
        $this->challenged = $challenged;
    }

    /**
     * @return mixed
     */
    public function getExemptionType()
    {
        return $this->exemptionType;
    }

    /**
     * @param mixed $exemptionType
     */
    public function setExemptionType($exemptionType)
    {
        $this->exemptionType = $exemptionType;
    }



    /**
     * @return mixed
     */
    public function getThreeDSVersion()
    {
        return $this->threeDSVersion;
    }

    /**
     * @param mixed $threeDSVersion
     */
    public function setThreeDSVersion($threeDSVersion) 
    {
        $this->threeDSVersion = $threeDSVersion;
    }

    /**
     * @return mixed
     */
    public function getEci()
    {
        return $this->eci;
    }

    /**
     * @param mixed $eci
     */
    public function setEci($eci) 
    {
        $this->eci = $eci;
    }

    /**
     * @return mixed
     */
    public function getCavv()
    {
        return $this->cavv;
    }

    /**
     * @param mixed $cavv
     */
    public function setCavv($cavv) 
    {
        $this->cavv = $cavv;
    }

    /**
     * @return mixed
     */
    public function getDsTransactionId()
    {
        return $this->dsTransactionId;
    }

    /**
     * @param mixed $dsTransactionId
     */
    public function setDsTransactionId($dsTransactionId) 
    {
        $this->dsTransactionId = $dsTransactionId;
    }

    /**
     * @return mixed
     */
    public function getXid()
    {
        return $this->xid;
    }

    /**
     * @param mixed $xid
     */
    public function setXid($xid) 
    {
        $this->xid = $xid;
    }



}
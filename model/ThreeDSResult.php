<?php

namespace Model;

class ThreeDSResult
{

    public $threeDSVersion;

    public $eci;

    public $cavv;

    public $dsTransactionId;

    public $xid;

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
    public function setThreeDSVersion($threeDSVersion): void
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
    public function setEci($eci): void
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
    public function setCavv($cavv): void
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
    public function setDsTransactionId($dsTransactionId): void
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
    public function setXid($xid): void
    {
        $this->xid = $xid;
    }



}
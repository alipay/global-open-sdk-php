<?php

class Certificate {

    public $certificateType;
    public $certificateNo;
    public $holderName;

    /**
     * @return mixed
     */
    public function getCertificateType()
    {
        return $this->certificateType;
    }

    /**
     * @param mixed $certificateType
     */
    public function setCertificateType($certificateType)
    {
        $this->certificateType = $certificateType;
    }

    /**
     * @return mixed
     */
    public function getCertificateNo()
    {
        return $this->certificateNo;
    }

    /**
     * @param mixed $certificateNo
     */
    public function setCertificateNo($certificateNo)
    {
        $this->certificateNo = $certificateNo;
    }

    /**
     * @return mixed
     */
    public function getHolderName()
    {
        return $this->holderName;
    }

    /**
     * @param mixed $holderName
     */
    public function setHolderName($holderName)
    {
        $this->holderName = $holderName;
    }



}
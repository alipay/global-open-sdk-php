<?php

namespace Model;
class Certificate
{

    public $certificateType;
    public $certificateNo;
    public $holderName;
    public $fileKeys;
    public $certificateAuthority;

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
    public function setCertificateType($certificateType): void
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
    public function setCertificateNo($certificateNo): void
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
    public function setHolderName($holderName): void
    {
        $this->holderName = $holderName;
    }

    /**
     * @return mixed
     */
    public function getFileKeys()
    {
        return $this->fileKeys;
    }

    /**
     * @param mixed $fileKeys
     */
    public function setFileKeys($fileKeys): void
    {
        $this->fileKeys = $fileKeys;
    }

    /**
     * @return mixed
     */
    public function getCertificateAuthority()
    {
        return $this->certificateAuthority;
    }

    /**
     * @param mixed $certificateAuthority
     */
    public function setCertificateAuthority($certificateAuthority): void
    {
        $this->certificateAuthority = $certificateAuthority;
    }


}
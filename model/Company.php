<?php

namespace Model;

class Company
{
    public $legalName;
    public $companyType;
    public $registeredAddress;
    public $operatingAddress;
    public $incorporationDate;
    public $stockInfo;
    public $certificates;
    public $attachments;
    public $companyUnit;
    public $contacts;
    public $vatNo;

    /**
     * @return mixed
     */
    public function getLegalName()
    {
        return $this->legalName;
    }

    /**
     * @param mixed $legalName
     */
    public function setLegalName($legalName): void
    {
        $this->legalName = $legalName;
    }

    /**
     * @return mixed
     */
    public function getCompanyType()
    {
        return $this->companyType;
    }

    /**
     * @param mixed $companyType
     */
    public function setCompanyType($companyType): void
    {
        $this->companyType = $companyType;
    }

    /**
     * @return mixed
     */
    public function getRegisteredAddress()
    {
        return $this->registeredAddress;
    }

    /**
     * @param mixed $registeredAddress
     */
    public function setRegisteredAddress($registeredAddress): void
    {
        $this->registeredAddress = $registeredAddress;
    }

    /**
     * @return mixed
     */
    public function getOperatingAddress()
    {
        return $this->operatingAddress;
    }

    /**
     * @param mixed $operatingAddress
     */
    public function setOperatingAddress($operatingAddress): void
    {
        $this->operatingAddress = $operatingAddress;
    }

    /**
     * @return mixed
     */
    public function getIncorporationDate()
    {
        return $this->incorporationDate;
    }

    /**
     * @param mixed $incorporationDate
     */
    public function setIncorporationDate($incorporationDate): void
    {
        $this->incorporationDate = $incorporationDate;
    }

    /**
     * @return mixed
     */
    public function getStockInfo()
    {
        return $this->stockInfo;
    }

    /**
     * @param mixed $stockInfo
     */
    public function setStockInfo($stockInfo): void
    {
        $this->stockInfo = $stockInfo;
    }

    /**
     * @return mixed
     */
    public function getCertificates()
    {
        return $this->certificates;
    }

    /**
     * @param mixed $certificates
     */
    public function setCertificates($certificates): void
    {
        $this->certificates = $certificates;
    }

    /**
     * @return mixed
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param mixed $attachments
     */
    public function setAttachments($attachments): void
    {
        $this->attachments = $attachments;
    }

    /**
     * @return mixed
     */
    public function getCompanyUnit()
    {
        return $this->companyUnit;
    }

    /**
     * @param mixed $companyUnit
     */
    public function setCompanyUnit($companyUnit): void
    {
        $this->companyUnit = $companyUnit;
    }

    /**
     * @return mixed
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param mixed $contacts
     */
    public function setContacts($contacts): void
    {
        $this->contacts = $contacts;
    }

    /**
     * @return mixed
     */
    public function getVatNo()
    {
        return $this->vatNo;
    }

    /**
     * @param mixed $vatNo
     */
    public function setVatNo($vatNo): void
    {
        $this->vatNo = $vatNo;
    }


}
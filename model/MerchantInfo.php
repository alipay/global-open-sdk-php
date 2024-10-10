<?php

namespace Model;

class MerchantInfo
{
    public $referenceMerchantId;
    public $loginId;
    public $legalEntityType;
    public $company;
    public $businessInfo;
    public $entityAssociations;

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
    public function setReferenceMerchantId($referenceMerchantId): void
    {
        $this->referenceMerchantId = $referenceMerchantId;
    }

    /**
     * @return mixed
     */
    public function getLoginId()
    {
        return $this->loginId;
    }

    /**
     * @param mixed $loginId
     */
    public function setLoginId($loginId): void
    {
        $this->loginId = $loginId;
    }

    /**
     * @return mixed
     */
    public function getLegalEntityType()
    {
        return $this->legalEntityType;
    }

    /**
     * @param mixed $legalEntityType
     */
    public function setLegalEntityType($legalEntityType): void
    {
        $this->legalEntityType = $legalEntityType;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company): void
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getBusinessInfo()
    {
        return $this->businessInfo;
    }

    /**
     * @param mixed $businessInfo
     */
    public function setBusinessInfo($businessInfo): void
    {
        $this->businessInfo = $businessInfo;
    }

    /**
     * @return mixed
     */
    public function getEntityAssociations()
    {
        return $this->entityAssociations;
    }

    /**
     * @param mixed $entityAssociations
     */
    public function setEntityAssociations($entityAssociations): void
    {
        $this->entityAssociations = $entityAssociations;
    }


}
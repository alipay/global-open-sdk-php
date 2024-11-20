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
    public function setReferenceMerchantId($referenceMerchantId) 
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
    public function setLoginId($loginId) 
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
    public function setLegalEntityType($legalEntityType) 
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
    public function setCompany($company) 
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
    public function setBusinessInfo($businessInfo) 
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
    public function setEntityAssociations($entityAssociations) 
    {
        $this->entityAssociations = $entityAssociations;
    }


}
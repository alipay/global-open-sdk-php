<?php

namespace Model;

class EntityAssociations
{
    public $associationType;
    public $legalEntityType;

    public $company;
    public $individual;
    public $shareholdingRatio;

    /**
     * @return mixed
     */
    public function getAssociationType()
    {
        return $this->associationType;
    }

    /**
     * @param mixed $associationType
     */
    public function setAssociationType($associationType) 
    {
        $this->associationType = $associationType;
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
    public function getIndividual()
    {
        return $this->individual;
    }

    /**
     * @param mixed $individual
     */
    public function setIndividual($individual) 
    {
        $this->individual = $individual;
    }

    /**
     * @return mixed
     */
    public function getShareholdingRatio()
    {
        return $this->shareholdingRatio;
    }

    /**
     * @param mixed $shareholdingRatio
     */
    public function setShareholdingRatio($shareholdingRatio) 
    {
        $this->shareholdingRatio = $shareholdingRatio;
    }


}
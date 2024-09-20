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
    public function getAssociationTyzpe()
    {
        return $this->associationTyzpe;
    }

    /**
     * @param mixed $associationTyzpe
     */
    public function setAssociationTyzpe($associationTyzpe): void
    {
        $this->associationTyzpe = $associationTyzpe;
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
    public function getIndividual()
    {
        return $this->individual;
    }

    /**
     * @param mixed $individual
     */
    public function setIndividual($individual): void
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
    public function setShareholdingRatio($shareholdingRatio): void
    {
        $this->shareholdingRatio = $shareholdingRatio;
    }


}
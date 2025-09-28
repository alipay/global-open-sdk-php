<?php

namespace Model;

class Declaration
{

    public $declarationBizScene;
    public $declarationBeneficiaryId;

    /**
     * @return mixed
     */
    public function getDeclarationBizScene()
    {
        return $this->declarationBizScene;
    }

    /**
     * @param mixed $declarationBizScene
     */
    public function setDeclarationBizScene($declarationBizScene)
    {
        $this->declarationBizScene = $declarationBizScene;
    }

    /**
     * @return mixed
     */
    public function getDeclarationBeneficiaryId()
    {
        return $this->declarationBeneficiaryId;
    }

    /**
     * @param mixed $declarationBeneficiaryId
     */
    public function setDeclarationBeneficiaryId($declarationBeneficiaryId)
    {
        $this->declarationBeneficiaryId = $declarationBeneficiaryId;
    }



}
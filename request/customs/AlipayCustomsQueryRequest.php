<?php

class AlipayCustomsQueryRequest extends AlipayRequest{

    public $declarationRequestIds;

    /**
     * @return mixed
     */
    public function getDeclarationRequestIds()
    {
        return $this->declarationRequestIds;
    }

    /**
     * @param mixed $declarationRequestIds
     */
    public function setDeclarationRequestIds($declarationRequestIds)
    {
        $this->declarationRequestIds = $declarationRequestIds;
    }



}
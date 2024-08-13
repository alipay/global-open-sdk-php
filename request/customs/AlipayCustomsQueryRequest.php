<?php

require_once 'request/AlipayRequest.php';
require_once 'model/AntomPathConstants.php';

class AlipayCustomsQueryRequest  extends AlipayRequest
{

    public $declarationRequestIds;


    function __construct(){
        $this->setPath(AntomPathConstants::INQUIRY_DECLARE_PATH);
    }


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
    public function setDeclarationRequestIds($declarationRequestIds): void
    {
        $this->declarationRequestIds = $declarationRequestIds;
    }



}
<?php


namespace Request\customs;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayCustomsQueryRequest extends AlipayRequest
{

    public $declarationRequestIds;


    function __construct()
    {
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
    public function setDeclarationRequestIds($declarationRequestIds) 
    {
        $this->declarationRequestIds = $declarationRequestIds;
    }


}
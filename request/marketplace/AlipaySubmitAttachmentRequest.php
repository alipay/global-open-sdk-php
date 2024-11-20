<?php

namespace Request\marketplace;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipaySubmitAttachmentRequest extends AlipayRequest
{
    public $submitAttachmentRequestId;
    public $attachmentType;
    public $fileSha256;

    function __construct()
    {
        $this->setPath(AntomPathConstants::MARKETPLACE_SUBMITATTACHMENT_PATH);
    }

    /**
     * @return mixed
     */
    public function getSubmitAttachmentRequestId()
    {
        return $this->submitAttachmentRequestId;
    }

    /**
     * @param mixed $submitAttachmentRequestId
     */
    public function setSubmitAttachmentRequestId($submitAttachmentRequestId) 
    {
        $this->submitAttachmentRequestId = $submitAttachmentRequestId;
    }

    /**
     * @return mixed
     */
    public function getAttachmentType()
    {
        return $this->attachmentType;
    }

    /**
     * @param mixed $attachmentType
     */
    public function setAttachmentType($attachmentType) 
    {
        $this->attachmentType = $attachmentType;
    }

    /**
     * @return mixed
     */
    public function getFileSha256()
    {
        return $this->fileSha256;
    }

    /**
     * @param mixed $fileSha256
     */
    public function setFileSha256($fileSha256) 
    {
        $this->fileSha256 = $fileSha256;
    }



}
<?php

namespace Request\marketplace;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayCreatePayoutRequest extends AlipayRequest
{

    public $transferRequestId;
    public $transferFromDetail;

    public $transferToDetail;


    function __construct()
    {
        $this->setPath(AntomPathConstants::MARKETPLACE_CREATEPAYOUT_PATH);
    }

    /**
     * @return mixed
     */
    public function getTransferRequestId()
    {
        return $this->transferRequestId;
    }

    /**
     * @param mixed $transferRequestId
     */
    public function setTransferRequestId($transferRequestId): void
    {
        $this->transferRequestId = $transferRequestId;
    }

    /**
     * @return mixed
     */
    public function getTransferFromDetail()
    {
        return $this->transferFromDetail;
    }

    /**
     * @param mixed $transferFromDetail
     */
    public function setTransferFromDetail($transferFromDetail): void
    {
        $this->transferFromDetail = $transferFromDetail;
    }

    /**
     * @return mixed
     */
    public function getTransferToDetail()
    {
        return $this->transferToDetail;
    }

    /**
     * @param mixed $transferToDetail
     */
    public function setTransferToDetail($transferToDetail): void
    {
        $this->transferToDetail = $transferToDetail;
    }


}
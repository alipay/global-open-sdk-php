<?php

namespace Request\notify;

class AlipayABATransferNotify extends \Request\notify\AlipayNotify
{
    /**
     * The unique ID assigned by the merchant to identify a transfer request.
     * Maximum length: 64 characters
     */
    public $transferRequestId;

    /**
     * The unique ID assigned by Antom to identify a transfer.
     * Maximum length: 64 characters
     */
    public $transferId;

    /**
     * The result of the transfer request.
     */
    public $transferResult;

    /**
     * The finishing time of a transfer.
     */
    public $transferFinishTime;

    /**
     * The transfer from detail information.
     */
    public $transferFromDetail;

    /**
     * The transfer to detail information.
     */
    public $transferToDetail;

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
    public function getTransferId()
    {
        return $this->transferId;
    }

    /**
     * @param mixed $transferId
     */
    public function setTransferId($transferId): void
    {
        $this->transferId = $transferId;
    }

    /**
     * @return mixed
     */
    public function getTransferResult()
    {
        return $this->transferResult;
    }

    /**
     * @param mixed $transferResult
     */
    public function setTransferResult($transferResult): void
    {
        $this->transferResult = $transferResult;
    }

    /**
     * @return mixed
     */
    public function getTransferFinishTime()
    {
        return $this->transferFinishTime;
    }

    /**
     * @param mixed $transferFinishTime
     */
    public function setTransferFinishTime($transferFinishTime): void
    {
        $this->transferFinishTime = $transferFinishTime;
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
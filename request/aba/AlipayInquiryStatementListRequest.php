<?php

namespace Request\aba;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayInquiryStatementListRequest extends AlipayRequest
{

    public   $customerId;
    public   $accessToken;
    public   $startTime;
    public   $endTime;
    public   $transactionTypeList;
    public   $currencyList;
    public   $pageSize;
    public   $pageNumber;



    function __construct()
    {
        $this->setPath(AntomPathConstants::ABA_INQUERY_STATEMENT_LIST_PATH);
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerId
     */
    public function setCustomerId($customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param mixed $accessToken
     */
    public function setAccessToken($accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * @return mixed
     */
    public function getTransactionTypeList()
    {
        return $this->transactionTypeList;
    }

    /**
     * @param mixed $transactionTypeList
     */
    public function setTransactionTypeList($transactionTypeList): void
    {
        $this->transactionTypeList = $transactionTypeList;
    }

    /**
     * @return mixed
     */
    public function getCurrencyList()
    {
        return $this->currencyList;
    }

    /**
     * @param mixed $currencyList
     */
    public function setCurrencyList($currencyList): void
    {
        $this->currencyList = $currencyList;
    }

    /**
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param mixed $pageSize
     */
    public function setPageSize($pageSize): void
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * @param mixed $pageNumber
     */
    public function setPageNumber($pageNumber): void
    {
        $this->pageNumber = $pageNumber;
    }





}
<?php

namespace Model;

class TransferFromDetail
{
    public $transferFromMethod;
    public $transferFromAmount;

    /**
     * @return mixed
     */
    public function getTransferFromMethod()
    {
        return $this->transferFromMethod;
    }

    /**
     * @param mixed $transferFromMethod
     */
    public function setTransferFromMethod($transferFromMethod): void
    {
        $this->transferFromMethod = $transferFromMethod;
    }

    /**
     * @return mixed
     */
    public function getTransferFromAmount()
    {
        return $this->transferFromAmount;
    }

    /**
     * @param mixed $transferFromAmount
     */
    public function setTransferFromAmount($transferFromAmount): void
    {
        $this->transferFromAmount = $transferFromAmount;
    }


}
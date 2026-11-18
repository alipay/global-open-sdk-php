<?php

namespace Model;

class FailReason
{
    public $errorCode;
    public $errorDesc;

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param mixed $errorCode
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
    }

    /**
     * @return mixed
     */
    public function getErrorDesc()
    {
        return $this->errorDesc;
    }

    /**
     * @param mixed $errorDesc
     */
    public function setErrorDesc($errorDesc)
    {
        $this->errorDesc = $errorDesc;
    }

    /**
     * 从数组解析 FailReason
     * @param array $data
     */
    public function parseFromArray(array $data)
    {
        if (isset($data['errorCode'])) {
            $this->setErrorCode($data['errorCode']);
        }
        if (isset($data['errorDesc'])) {
            $this->setErrorDesc($data['errorDesc']);
        }
    }
}
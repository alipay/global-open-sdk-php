<?php

namespace Request\notify;

class AlipayNotify
{
    public $notifyType;

    public $result;

    /**
     * @return mixed
     */
    public function getNotifyType()
    {
        return $this->notifyType;
    }

    /**
     * @param mixed $notifyType
     */
    public function setNotifyType($notifyType): void
    {
        $this->notifyType = $notifyType;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result): void
    {
        $this->result = $result;
    }




}
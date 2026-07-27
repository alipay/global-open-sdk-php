<?php

namespace Model;

class ErrorEvent
{
    public $errorCode;
    public $idempotencyKey;
    public $eventTimestamp;
    public $payload;

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
    public function setErrorCode($errorCode): void
    {
        $this->errorCode = $errorCode;
    }

    /**
     * @return mixed
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * @param mixed $idempotencyKey
     */
    public function setIdempotencyKey($idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * @return mixed
     */
    public function getEventTimestamp()
    {
        return $this->eventTimestamp;
    }

    /**
     * @param mixed $eventTimestamp
     */
    public function setEventTimestamp($eventTimestamp): void
    {
        $this->eventTimestamp = $eventTimestamp;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param mixed $payload
     */
    public function setPayload($payload): void
    {
        $this->payload = $payload;
    }
}

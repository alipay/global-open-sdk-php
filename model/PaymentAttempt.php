<?php

namespace Model;

class PaymentAttempt
{
    public  $attemptAt;
    public  $attemptResponse;

    /**
     * @return mixed
     */
    public function getAttemptAt()
    {
        return $this->attemptAt;
    }

    /**
     * @param mixed $attemptAt
     */
    public function setAttemptAt($attemptAt): void
    {
        $this->attemptAt = $attemptAt;
    }

    /**
     * @return mixed
     */
    public function getAttemptResponse()
    {
        return $this->attemptResponse;
    }

    /**
     * @param mixed $attemptResponse
     */
    public function setAttemptResponse($attemptResponse): void
    {
        $this->attemptResponse = $attemptResponse;
    }



}
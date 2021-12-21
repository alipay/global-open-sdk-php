<?php

class AlipayInquiryRefundRequest extends AlipayRequest{

    public $refundRequestId;

    public $refundId;

    /**
     * @return mixed
     */
    public function getRefundRequestId()
    {
        return $this->refundRequestId;
    }

    /**
     * @param mixed $refundRequestId
     */
    public function setRefundRequestId($refundRequestId)
    {
        $this->refundRequestId = $refundRequestId;
    }

    /**
     * @return mixed
     */
    public function getRefundId()
    {
        return $this->refundId;
    }

    /**
     * @param mixed $refundId
     */
    public function setRefundId($refundId)
    {
        $this->refundId = $refundId;
    }



}
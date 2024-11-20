<?php

namespace Request\pay;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayInquiryRefundRequest extends AlipayRequest
{

    /**
     * The unique ID assigned by a merchant to identify a refund request
     */
    public $refundRequestId;

    /**
     * The unique ID assigned by Alipay to identify a refund
     */
    public $refundId;

    /**
     * The unique ID to identify a merchant account.
     */
    public $merchantAccountId;


    function __construct()
    {
        $this->setPath(AntomPathConstants::INQUIRY_REFUND_PATH);
    }

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

    /**
     * @return mixed
     */
    public function getMerchantAccountId()
    {
        return $this->merchantAccountId;
    }

    /**
     * @param mixed $merchantAccountId
     */
    public function setMerchantAccountId($merchantAccountId) 
    {
        $this->merchantAccountId = $merchantAccountId;
    }


}
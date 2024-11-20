<?php

namespace Request\subscription;

use Model\AntomPathConstants;
use Request\AlipayRequest;


class AlipaySubscriptionCancelRequest extends AlipayRequest
{

    /**
     * The unique ID assigned by Alipay to identify a subscription.
     */
    public $subscriptionId;

    /**
     * The unique ID assigned by a merchant to identify a subscription request.
     */
    public $subscriptionRequestId;

    /**
     * The cancellation type for the subscription. Valid values are:
     * <p>
     * CANCEL: indicates canceling the subscription. The subscription service is not provided to the user after the current subscription period ends.
     * TERMINATE: indicates terminating the subscription. The subscription service is ceased immediately.
     */
    public $cancellationType;

    function __construct()
    {
        $this->setPath(AntomPathConstants::SUBSCRIPTION_CANCEL_PATH);
    }


    /**
     * @return mixed
     */
    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    /**
     * @param mixed $subscriptionId
     */
    public function setSubscriptionId($subscriptionId) 
    {
        $this->subscriptionId = $subscriptionId;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionRequestId()
    {
        return $this->subscriptionRequestId;
    }

    /**
     * @param mixed $subscriptionRequestId
     */
    public function setSubscriptionRequestId($subscriptionRequestId) 
    {
        $this->subscriptionRequestId = $subscriptionRequestId;
    }

    /**
     * @return mixed
     */
    public function getCancellationType()
    {
        return $this->cancellationType;
    }

    /**
     * @param mixed $cancellationType
     */
    public function setCancellationType($cancellationType) 
    {
        $this->cancellationType = $cancellationType;
    }


}
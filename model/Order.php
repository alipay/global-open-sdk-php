<?php

namespace Model;

class Order
{

    public $referenceOrderId;
    public $orderDescription;
    public $orderAmount;
    public $merchant;
    public $goods;
    public $shipping;
    public $buyer;
    public $env;
    public $extendInfo;
    public $transit;
    public $lodging;
    public $gaming;

    public $orderCreatedTime;

    public $needDeclaration;



    /**
     * @return mixed
     */
    public function getOrderCreatedTime()
    {
        return $this->orderCreatedTime;
    }

    /**
     * @param mixed $orderCreatedTime
     */
    public function setOrderCreatedTime($orderCreatedTime)
    {
        $this->orderCreatedTime = $orderCreatedTime;
    }

    /**
     * @return mixed
     */
    public function getNeedDeclaration()
    {
        return $this->needDeclaration;
    }

    /**
     * @param mixed $needDeclaration
     */
    public function setNeedDeclaration($needDeclaration)
    {
        $this->needDeclaration = $needDeclaration;
    }



    /**
     * @return String
     */
    public function getReferenceOrderId()
    {
        return $this->referenceOrderId;
    }

    /**
     * @param String $referenceOrderId
     */
    public function setReferenceOrderId($referenceOrderId)
    {
        $this->referenceOrderId = $referenceOrderId;
    }

    /**
     * @return String
     */
    public function getOrderDescription()
    {
        return $this->orderDescription;
    }

    /**
     * @param String $orderDescription
     */
    public function setOrderDescription($orderDescription)
    {
        $this->orderDescription = $orderDescription;
    }

    /**
     * @return Amount
     */
    public function getOrderAmount()
    {
        return $this->orderAmount;
    }

    /**
     * @param Amount $orderAmount
     */
    public function setOrderAmount($orderAmount)
    {
        $this->orderAmount = $orderAmount;
    }

    /**
     * @return Merchant
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * @param Merchant $merchant
     */
    public function setMerchant($merchant)
    {
        $this->merchant = $merchant;
    }

    /**
     * @return Goods
     */
    public function getGoods()
    {
        return $this->goods;
    }

    /**
     * @param Goods $goods
     */
    public function setGoods($goods)
    {
        $this->goods = $goods;
    }

    /**
     * @return Shipping
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param Shipping $shipping
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
    }

    /**
     * @return Buyer
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * @param Buyer $buyer
     */
    public function setBuyer($buyer)
    {
        $this->buyer = $buyer;
    }

    /**
     * @return Env
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @param Env $env
     */
    public function setEnv($env)
    {
        $this->env = $env;
    }

    /**
     * @return mixed
     */
    public function getExtendInfo()
    {
        return $this->extendInfo;
    }

    /**
     * @param mixed $extendInfo
     */
    public function setExtendInfo($extendInfo)
    {
        $this->extendInfo = $extendInfo;
    }

    /**
     * @return mixed
     */
    public function getGaming()
    {
        return $this->gaming;
    }

    /**
     * @param mixed $gaming
     */
    public function setGaming($gaming)
    {
        $this->gaming = $gaming;
    }

    /**
     * @return mixed
     */
    public function getLodging()
    {
        return $this->lodging;
    }

    /**
     * @param mixed $lodging
     */
    public function setLodging($lodging)
    {
        $this->lodging = $lodging;
    }

    /**
     * @return mixed
     */
    public function getTransit()
    {
        return $this->transit;
    }

    /**
     * @param mixed $transit
     */
    public function setTransit($transit)
    {
        $this->transit = $transit;
    }



}
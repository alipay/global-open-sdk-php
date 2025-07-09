<?php

namespace Model;
class Shipping
{

    public $shippingName;
    public $shippingAddress;
    public $shippingCarrier;
    public $shippingPhoneNo;

    public $shippingNumber;
    public $shipToEmail;
    public $notes;
    public $shippingFeeId;
    public $shippingFee;
    public $shippingDescription;
    public $deliveryEstimate;

    /**
     * @return mixed
     */
    public function getShippingNumber()
    {
        return $this->shippingNumber;
    }

    /**
     * @param mixed $shippingNumber
     */
    public function setShippingNumber($shippingNumber)
    {
        $this->shippingNumber = $shippingNumber;
    }

    /**
     * @return mixed
     */
    public function getShipToEmail()
    {
        return $this->shipToEmail;
    }

    /**
     * @param mixed $shipToEmail
     */
    public function setShipToEmail($shipToEmail)
    {
        $this->shipToEmail = $shipToEmail;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getShippingFeeId()
    {
        return $this->shippingFeeId;
    }

    /**
     * @param mixed $shippingFeeId
     */
    public function setShippingFeeId($shippingFeeId)
    {
        $this->shippingFeeId = $shippingFeeId;
    }

    /**
     * @return mixed
     */
    public function getShippingFee()
    {
        return $this->shippingFee;
    }

    /**
     * @param mixed $shippingFee
     */
    public function setShippingFee($shippingFee)
    {
        $this->shippingFee = $shippingFee;
    }

    /**
     * @return mixed
     */
    public function getShippingDescription()
    {
        return $this->shippingDescription;
    }

    /**
     * @param mixed $shippingDescription
     */
    public function setShippingDescription($shippingDescription)
    {
        $this->shippingDescription = $shippingDescription;
    }

    /**
     * @return mixed
     */
    public function getDeliveryEstimate()
    {
        return $this->deliveryEstimate;
    }

    /**
     * @param mixed $deliveryEstimate
     */
    public function setDeliveryEstimate($deliveryEstimate)
    {
        $this->deliveryEstimate = $deliveryEstimate;
    }


    /**
     * @return String
     */
    public function getShippingName()
    {
        return $this->shippingName;
    }

    /**
     * @param String $shippingName
     */
    public function setShippingName($shippingName)
    {
        $this->shippingName = $shippingName;
    }

    /**
     * @return Address
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param Address $shippingAddress
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * @return String
     */
    public function getShippingCarrier()
    {
        return $this->shippingCarrier;
    }

    /**
     * @param String $shippingCarrier
     */
    public function setShippingCarrier($shippingCarrier)
    {
        $this->shippingCarrier = $shippingCarrier;
    }

    /**
     * @return String
     */
    public function getShippingPhoneNo()
    {
        return $this->shippingPhoneNo;
    }

    /**
     * @param String $shippingPhoneNo
     */
    public function setShippingPhoneNo($shippingPhoneNo)
    {
        $this->shippingPhoneNo = $shippingPhoneNo;
    }


}
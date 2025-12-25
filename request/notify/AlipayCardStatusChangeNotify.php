<?php

namespace Request\notify;

class AlipayCardStatusChangeNotify extends AlipayNotify
{
    public $requestId;
    public $assetId;
    public $operateType;
    public $status;
    public $cardStatus;
    public $createdTime;
    public $updatedTime;
    public $cardBrand;
    public $cardType;

    public function __construct($notifyBody)
    {
        $notify = $this->parseNotifyBody($notifyBody);

        if (isset($notify['requestId'])) {
            $this->setRequestId($notify['requestId']);
        }
        if (isset($notify['assetId'])) {
            $this->setAssetId($notify['assetId']);
        }
        if (isset($notify['operateType'])) {
            $this->setOperateType($notify['operateType']);
        }
        if (isset($notify['status'])) {
            $this->setStatus($notify['status']);
        }
        if (isset($notify['cardStatus'])) {
            $this->setCardStatus($notify['cardStatus']);
        }
        if (isset($notify['createdTime'])) {
            $this->setCreatedTime($notify['createdTime']);
        }
        if (isset($notify['updatedTime'])) {
            $this->setUpdatedTime($notify['updatedTime']);
        }
        if (isset($notify['cardBrand'])) {
            $this->setCardBrand($notify['cardBrand']);
        }
        if (isset($notify['cardType'])) {
            $this->setCardType($notify['cardType']);
        }
    }

    // --- Getters and Setters ---

    public function getRequestId() { return $this->requestId; }
    public function setRequestId($requestId) { $this->requestId = $requestId; }

    public function getAssetId() { return $this->assetId; }
    public function setAssetId($assetId) { $this->assetId = $assetId; }

    public function getOperateType() { return $this->operateType; }
    public function setOperateType($operateType) { $this->operateType = $operateType; }

    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; }

    public function getCardStatus() { return $this->cardStatus; }
    public function setCardStatus($cardStatus) { $this->cardStatus = $cardStatus; }

    public function getCreatedTime() { return $this->createdTime; }
    public function setCreatedTime($createdTime) { $this->createdTime = $createdTime; }

    public function getUpdatedTime() { return $this->updatedTime; }
    public function setUpdatedTime($updatedTime) { $this->updatedTime = $updatedTime; }

    public function getCardBrand() { return $this->cardBrand; }
    public function setCardBrand($cardBrand) { $this->cardBrand = $cardBrand; }

    public function getCardType() { return $this->cardType; }
    public function setCardType($cardType) { $this->cardType = $cardType; }
}

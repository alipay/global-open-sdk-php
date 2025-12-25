<?php
namespace Request\notify;

use Request\notify\AlipayNotify;


class AlipayBillNotify extends AlipayNotify
{
    public $assetId;
    public $maskedCardNo;
    public $orderNo;
    public $cardNickName;
    public $transactionTime;
    public $merchantName;
    public $tradeAmount;
    public $inAmount;
    public $outAmount;
    public $exchangeRate;
    public $billType;
    public $tradeCountry;
    public $billStatus;
    public $billFailReason; // FailReason 对象
    public $lastUpdate;
    public $metadata;

    public function __construct($notifyBody)
    {
        $notify = $this->parseNotifyBody($notifyBody);

        if (isset($notify['assetId'])) {
            $this->setAssetId($notify['assetId']);
        }
        if (isset($notify['maskedCardNo'])) {
            $this->setMaskedCardNo($notify['maskedCardNo']);
        }
        if (isset($notify['orderNo'])) {
            $this->setOrderNo($notify['orderNo']);
        }
        if (isset($notify['cardNickName'])) {
            $this->setCardNickName($notify['cardNickName']);
        }
        if (isset($notify['transactionTime'])) {
            $this->setTransactionTime($notify['transactionTime']);
        }
        if (isset($notify['merchantName'])) {
            $this->setMerchantName($notify['merchantName']);
        }

        if (isset($notify['tradeAmount'])) {
            $this->setTradeAmount($notify['tradeAmount']);
        }
        if (isset($notify['inAmount'])) {
            $this->setInAmount($notify['inAmount']);
        }
        if (isset($notify['outAmount'])) {
            $this->setOutAmount($notify['outAmount']);
        }

        if (isset($notify['exchangeRate'])) {
            $this->setExchangeRate($notify['exchangeRate']);
        }
        if (isset($notify['billType'])) {
            $this->setBillType($notify['billType']);
        }
        if (isset($notify['tradeCountry'])) {
            $this->setTradeCountry($notify['tradeCountry']);
        }
        if (isset($notify['billStatus'])) {
            $this->setBillStatus($notify['billStatus']);
        }

        if (isset($notify['billFailReason']) && is_array($notify['billFailReason'])) {
            $failReason = new FailReason();
            $failReason->parseFromArray($notify['billFailReason']);
            $this->setBillFailReason($failReason);
        }

        if (isset($notify['lastUpdate'])) {
            $this->setLastUpdate($notify['lastUpdate']);
        }
        if (isset($notify['metadata'])) {
            $this->setMetadata($notify['metadata']);
        }
    }

    // --- Getters and Setters ---

    public function getAssetId() { return $this->assetId; }
    public function setAssetId($assetId) { $this->assetId = $assetId; }

    public function getMaskedCardNo() { return $this->maskedCardNo; }
    public function setMaskedCardNo($maskedCardNo) { $this->maskedCardNo = $maskedCardNo; }

    public function getOrderNo() { return $this->orderNo; }
    public function setOrderNo($orderNo) { $this->orderNo = $orderNo; }

    public function getCardNickName() { return $this->cardNickName; }
    public function setCardNickName($cardNickName) { $this->cardNickName = $cardNickName; }

    public function getTransactionTime() { return $this->transactionTime; }
    public function setTransactionTime($transactionTime) { $this->transactionTime = $transactionTime; }

    public function getMerchantName() { return $this->merchantName; }
    public function setMerchantName($merchantName) { $this->merchantName = $merchantName; }

    public function getTradeAmount() { return $this->tradeAmount; }
    public function setTradeAmount($tradeAmount) { $this->tradeAmount = $tradeAmount; }

    public function getInAmount() { return $this->inAmount; }
    public function setInAmount($inAmount) { $this->inAmount = $inAmount; }

    public function getOutAmount() { return $this->outAmount; }
    public function setOutAmount($outAmount) { $this->outAmount = $outAmount; }

    public function getExchangeRate() { return $this->exchangeRate; }
    public function setExchangeRate($exchangeRate) { $this->exchangeRate = $exchangeRate; }

    public function getBillType() { return $this->billType; }
    public function setBillType($billType) { $this->billType = $billType; }

    public function getTradeCountry() { return $this->tradeCountry; }
    public function setTradeCountry($tradeCountry) { $this->tradeCountry = $tradeCountry; }

    public function getBillStatus() { return $this->billStatus; }
    public function setBillStatus($billStatus) { $this->billStatus = $billStatus; }

    public function getBillFailReason() { return $this->billFailReason; }
    public function setBillFailReason($billFailReason) { $this->billFailReason = $billFailReason; }

    public function getLastUpdate() { return $this->lastUpdate; }
    public function setLastUpdate($lastUpdate) { $this->lastUpdate = $lastUpdate; }

    public function getMetadata() { return $this->metadata; }
    public function setMetadata($metadata) { $this->metadata = $metadata; }
}

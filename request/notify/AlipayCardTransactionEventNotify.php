<?php

namespace Request\notify;

/**
 * One flat ABA VCC card transaction event callback (notification profile v2.1, document v2.13).
 * Uses caller-owned hydration through public properties or setters, like existing PHP Notify DTOs.
 * Verify the raw-body signature first; the merchant handles eventId deduplication and ACK.
 * Amount values remain quoted minor-unit strings of up to 20 digits.
 */
class AlipayCardTransactionEventNotify
{
    /** @var string|null Stable event ID and the only callback idempotency key. Required; maximum 64 characters. */
    public $eventId;

    /** @var string|null Spend-group ID shared with inquiry. Required; maximum 64 characters. */
    public $lifecycleId;

    /** @var string|null Required event type: AUTH, AUTH_CANCEL, CAPTURE, REFUND, CHARGEBACK or REPAYMENT. Preserve unknown future values. */
    public $eventType;

    /** @var string|null Optional ISO 8601 time of the channel-correlated authorization, maximum 32 characters. Omitted for AUTH or when unavailable; never inferred from transactionTime or authExpireTime. */
    public $authTime;

    /** @var string|null Optional ISO 8601 authorization expiry time, maximum 32 characters. Sent only for AUTH when available. */
    public $authExpireTime;

    /** @var string|null Optional AUTH or PRE_AUTH, maximum 32 characters. Sent only for AUTH when available. */
    public $authType;

    /** @var string|null Optional network approval code, maximum 64 characters. Sent only for AUTH when available. */
    public $authCode;

    /** @var string|null Optional Antom-normalized failure code, maximum 64 characters. Sent only for FAIL when a mapped code exists. */
    public $failureReason;

    /** @var string|null Required terminal status: SUCCESS or FAIL. CAPTURE is SUCCESS-only. The accepted status never changes. */
    public $status;

    /** @var string|null ANTOM_BIZ_ACCOUNT or ANTOM_FUND_ACCOUNT, maximum 32 characters. Required with a directional amount; CAPTURE sends ANTOM_BIZ_ACCOUNT. */
    public $balanceType;

    /** @var string|null Required business-event time in ISO 8601 format with timezone; maximum 32 characters. */
    public $transactionTime;

    /** @var string|null Required CARD_PAYMENT for AUTH, CAPTURE and REPAYMENT, or CARD_REFUND for AUTH_CANCEL, REFUND and CHARGEBACK. */
    public $billType;

    /** @var \Model\Amount|null Required for successful AUTH, CAPTURE and REPAYMENT. CAPTURE carries value "0" and billing currency, not another debit; omitted otherwise. */
    public $outAmount;

    /** @var \Model\Amount|null Optional billing-currency inflow for successful AUTH_CANCEL, REFUND or CHARGEBACK when available. Omitted for CAPTURE. */
    public $inAmount;

    /** @var string|null Optional BASE/QUOTE currency pair, maximum 8 characters. Sent with exchangeRate for a cross-currency transaction when both are available. */
    public $exchangeCurrencyPair;

    /** @var string|null Optional positive quoted decimal string, maximum 32 characters. One major BASE unit equals this many QUOTE units; paired with exchangeCurrencyPair. */
    public $exchangeRate;

    /** @var \Model\Amount|null Required current-event amount in original transaction currency. For CAPTURE this is the captured amount, not the zero additional outflow. */
    public $transactionAmount;

    /** @var string|null Required merchant-owned card asset ID; maximum 32 characters. */
    public $assetId;

    /** @var string|null Optional PCI-safe card mask exposing at most the last four digits; maximum 32 characters. */
    public $maskedCardNo;

    /** @var string|null Optional original-transaction program code matching ^[A-Z0-9]{3}$. Extensible string, not a fixed enum or rebate rate; later card-profile changes do not rewrite it. */
    public $cardProduct;

    /** @var \Model\EventMerchantInfo|null Optional approved merchant context. Name maximum 256 characters, region exactly 2 and mcc exactly 4; parent omitted when no child is available. */
    public $merchantInfo;

    /** @var array<string,string>|null Optional approved context: at most 30 entries, keys at most 32 characters, values at most 128 and serialized JSON at most 3096. No key is approved in notification profile v2.1, so it is omitted. */
    public $metadata;

    /** @return string|null */
    public function getEventId()
    {
        return $this->eventId;
    }

    /** @param string|null $eventId */
    public function setEventId($eventId): void
    {
        $this->eventId = $eventId;
    }

    /** @return string|null */
    public function getLifecycleId()
    {
        return $this->lifecycleId;
    }

    /** @param string|null $lifecycleId */
    public function setLifecycleId($lifecycleId): void
    {
        $this->lifecycleId = $lifecycleId;
    }

    /** @return string|null */
    public function getEventType()
    {
        return $this->eventType;
    }

    /** @param string|null $eventType */
    public function setEventType($eventType): void
    {
        $this->eventType = $eventType;
    }

    /** @return string|null */
    public function getAuthTime()
    {
        return $this->authTime;
    }

    /** @param string|null $authTime */
    public function setAuthTime($authTime): void
    {
        $this->authTime = $authTime;
    }

    /** @return string|null */
    public function getAuthExpireTime()
    {
        return $this->authExpireTime;
    }

    /** @param string|null $authExpireTime */
    public function setAuthExpireTime($authExpireTime): void
    {
        $this->authExpireTime = $authExpireTime;
    }

    /** @return string|null */
    public function getAuthType()
    {
        return $this->authType;
    }

    /** @param string|null $authType */
    public function setAuthType($authType): void
    {
        $this->authType = $authType;
    }

    /** @return string|null */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /** @param string|null $authCode */
    public function setAuthCode($authCode): void
    {
        $this->authCode = $authCode;
    }

    /** @return string|null */
    public function getFailureReason()
    {
        return $this->failureReason;
    }

    /** @param string|null $failureReason */
    public function setFailureReason($failureReason): void
    {
        $this->failureReason = $failureReason;
    }

    /** @return string|null */
    public function getStatus()
    {
        return $this->status;
    }

    /** @param string|null $status */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /** @return string|null */
    public function getBalanceType()
    {
        return $this->balanceType;
    }

    /** @param string|null $balanceType */
    public function setBalanceType($balanceType): void
    {
        $this->balanceType = $balanceType;
    }

    /** @return string|null */
    public function getTransactionTime()
    {
        return $this->transactionTime;
    }

    /** @param string|null $transactionTime */
    public function setTransactionTime($transactionTime): void
    {
        $this->transactionTime = $transactionTime;
    }

    /** @return string|null */
    public function getBillType()
    {
        return $this->billType;
    }

    /** @param string|null $billType */
    public function setBillType($billType): void
    {
        $this->billType = $billType;
    }

    /** @return \Model\Amount|null */
    public function getOutAmount()
    {
        return $this->outAmount;
    }

    /** @param \Model\Amount|null $outAmount */
    public function setOutAmount($outAmount): void
    {
        $this->outAmount = $outAmount;
    }

    /** @return \Model\Amount|null */
    public function getInAmount()
    {
        return $this->inAmount;
    }

    /** @param \Model\Amount|null $inAmount */
    public function setInAmount($inAmount): void
    {
        $this->inAmount = $inAmount;
    }

    /** @return string|null */
    public function getExchangeCurrencyPair()
    {
        return $this->exchangeCurrencyPair;
    }

    /** @param string|null $exchangeCurrencyPair */
    public function setExchangeCurrencyPair($exchangeCurrencyPair): void
    {
        $this->exchangeCurrencyPair = $exchangeCurrencyPair;
    }

    /** @return string|null */
    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    /** @param string|null $exchangeRate */
    public function setExchangeRate($exchangeRate): void
    {
        $this->exchangeRate = $exchangeRate;
    }

    /** @return \Model\Amount|null */
    public function getTransactionAmount()
    {
        return $this->transactionAmount;
    }

    /** @param \Model\Amount|null $transactionAmount */
    public function setTransactionAmount($transactionAmount): void
    {
        $this->transactionAmount = $transactionAmount;
    }

    /** @return string|null */
    public function getAssetId()
    {
        return $this->assetId;
    }

    /** @param string|null $assetId */
    public function setAssetId($assetId): void
    {
        $this->assetId = $assetId;
    }

    /** @return string|null */
    public function getMaskedCardNo()
    {
        return $this->maskedCardNo;
    }

    /** @param string|null $maskedCardNo */
    public function setMaskedCardNo($maskedCardNo): void
    {
        $this->maskedCardNo = $maskedCardNo;
    }

    /** @return string|null */
    public function getCardProduct()
    {
        return $this->cardProduct;
    }

    /** @param string|null $cardProduct */
    public function setCardProduct($cardProduct): void
    {
        $this->cardProduct = $cardProduct;
    }

    /** @return \Model\EventMerchantInfo|null */
    public function getMerchantInfo()
    {
        return $this->merchantInfo;
    }

    /** @param \Model\EventMerchantInfo|null $merchantInfo */
    public function setMerchantInfo($merchantInfo): void
    {
        $this->merchantInfo = $merchantInfo;
    }

    /** @return array<string,string>|null */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /** @param array<string,string>|null $metadata */
    public function setMetadata($metadata): void
    {
        $this->metadata = $metadata;
    }

}

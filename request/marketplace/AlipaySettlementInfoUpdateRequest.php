<?php

namespace Request\marketplace;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipaySettlementInfoUpdateRequest extends AlipayRequest
{
    public $updateRequestId;
    public $referenceMerchantId;
    public $settlementCurrency;
    public $settlementBankAccount;

    function __construct()
    {
        $this->setPath(AntomPathConstants::MARKETPLACE_SETTLEMENTINFO_UPDATE_PATH);
    }

    /**
     * @return mixed
     */
    public function getUpdateRequestId()
    {
        return $this->updateRequestId;
    }

    /**
     * @param mixed $updateRequestId
     */
    public function setUpdateRequestId($updateRequestId) 
    {
        $this->updateRequestId = $updateRequestId;
    }

    /**
     * @return mixed
     */
    public function getReferenceMerchantId()
    {
        return $this->referenceMerchantId;
    }

    /**
     * @param mixed $referenceMerchantId
     */
    public function setReferenceMerchantId($referenceMerchantId) 
    {
        $this->referenceMerchantId = $referenceMerchantId;
    }

    /**
     * @return mixed
     */
    public function getSettlementCurrency()
    {
        return $this->settlementCurrency;
    }

    /**
     * @param mixed $settlementCurrency
     */
    public function setSettlementCurrency($settlementCurrency) 
    {
        $this->settlementCurrency = $settlementCurrency;
    }

    /**
     * @return mixed
     */
    public function getSettlementBankAccount()
    {
        return $this->settlementBankAccount;
    }

    /**
     * @param mixed $settlementBankAccount
     */
    public function setSettlementBankAccount($settlementBankAccount) 
    {
        $this->settlementBankAccount = $settlementBankAccount;
    }


}
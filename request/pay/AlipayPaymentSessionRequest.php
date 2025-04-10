<?php


namespace Request\pay;

use Model\AntomPathConstants;
use Request\AlipayRequest;

class AlipayPaymentSessionRequest extends AlipayRequest
{
    /**
     * Represents the payment product that is being used. The fixed value is CASHIER_PAYMENT
     */
    public $productCode;

    /**
     * The unique ID assigned by a merchant to identify a payment request
     */
    public $paymentRequestId;

    /**
     * The order information
     */
    public $order;

    /**
     * The payment amount that the merchant requests to receive in the order currency
     */
    public $paymentAmount;

    /**
     * The payment method that is used to collect the payment by the merchant or acquirer
     */
    public $paymentMethod;

    /**
     * The expiry time of paymentSession
     */
    public $paymentSessionExpiryTime;

    /**
     * The merchant page URL that the user is redirected to after the payment is completed
     */
    public $paymentRedirectUrl;

    /**
     * The URL that is used to receive the payment result notification
     */
    public $paymentNotifyUrl;

    /**
     * Factors that impact the payment. This field is used to indicate the payment scenario
     */
    public $paymentFactor;

    /**
     * The settlement strategy for the payment request
     */
    public $settlementStrategy;

    /**
     * Indicates whether Antom collects the installment information for the payment.
     */
    public $enableInstallmentCollection;

    /**
     * The credit payment plan information for this payment
     */
    public $creditPayPlan;

    /**
     * The country or region where the merchant operates the business
     */
    public $merchantRegion;

    /**
     * Information about the environment where the order is placed
     */
    public $env;

    /**
     * Authorization information about Easy Pay payments
     */
    public $agreementInfo;

    /**
     * The data used by Ant Group for risk control purposes.
     */
    public $riskData;

    /**
     * This param is used for Easy pay payments,set its value to EASY_PAY
     */
    public $productScene;

    public $savedPaymentMethods;

    public $locale;

    public $availablePaymentMethod;
    private $allowedPaymentMethodRegions;


    function __construct()
    {
        $this->setPath(AntomPathConstants::CREATE_SESSION_PATH);
    }

    /**
     * @return mixed
     */
    public function getAllowedPaymentMethodRegions()
    {
        return $this->allowedPaymentMethodRegions;
    }

    /**
     * @param mixed $allowedPaymentMethodRegions
     */
    public function setAllowedPaymentMethodRegions($allowedPaymentMethodRegions)
    {
        $this->allowedPaymentMethodRegions = $allowedPaymentMethodRegions;
    }



    /**
     * @return mixed
     */
    public function getAvailablePaymentMethod()
    {
        return $this->availablePaymentMethod;
    }

    /**
     * @param mixed $availablePaymentMethod
     */
    public function setAvailablePaymentMethod($availablePaymentMethod)
    {
        $this->availablePaymentMethod = $availablePaymentMethod;
    }

    /**
     * @return mixed
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @param mixed $productCode
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }

    /**
     * @return mixed
     */
    public function getPaymentRequestId()
    {
        return $this->paymentRequestId;
    }

    /**
     * @param mixed $paymentRequestId
     */
    public function setPaymentRequestId($paymentRequestId)
    {
        $this->paymentRequestId = $paymentRequestId;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    /**
     * @param mixed $paymentAmount
     */
    public function setPaymentAmount($paymentAmount)
    {
        $this->paymentAmount = $paymentAmount;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param mixed $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return mixed
     */
    public function getPaymentSessionExpiryTime()
    {
        return $this->paymentSessionExpiryTime;
    }

    /**
     * @param mixed $paymentSessionExpiryTime
     */
    public function setPaymentSessionExpiryTime($paymentSessionExpiryTime)
    {
        $this->paymentSessionExpiryTime = $paymentSessionExpiryTime;
    }

    /**
     * @return mixed
     */
    public function getPaymentRedirectUrl()
    {
        return $this->paymentRedirectUrl;
    }

    /**
     * @param mixed $paymentRedirectUrl
     */
    public function setPaymentRedirectUrl($paymentRedirectUrl)
    {
        $this->paymentRedirectUrl = $paymentRedirectUrl;
    }

    /**
     * @return mixed
     */
    public function getPaymentNotifyUrl()
    {
        return $this->paymentNotifyUrl;
    }

    /**
     * @param mixed $paymentNotifyUrl
     */
    public function setPaymentNotifyUrl($paymentNotifyUrl)
    {
        $this->paymentNotifyUrl = $paymentNotifyUrl;
    }

    /**
     * @return mixed
     */
    public function getPaymentFactor()
    {
        return $this->paymentFactor;
    }

    /**
     * @param mixed $paymentFactor
     */
    public function setPaymentFactor($paymentFactor)
    {
        $this->paymentFactor = $paymentFactor;
    }

    /**
     * @return mixed
     */
    public function getSettlementStrategy()
    {
        return $this->settlementStrategy;
    }

    /**
     * @param mixed $settlementStrategy
     */
    public function setSettlementStrategy($settlementStrategy)
    {
        $this->settlementStrategy = $settlementStrategy;
    }

    /**
     * @return mixed
     */
    public function getEnableInstallmentCollection()
    {
        return $this->enableInstallmentCollection;
    }

    /**
     * @param mixed $enableInstallmentCollection
     */
    public function setEnableInstallmentCollection($enableInstallmentCollection)
    {
        $this->enableInstallmentCollection = $enableInstallmentCollection;
    }

    /**
     * @return mixed
     */
    public function getCreditPayPlan()
    {
        return $this->creditPayPlan;
    }

    /**
     * @param mixed $creditPayPlan
     */
    public function setCreditPayPlan($creditPayPlan)
    {
        $this->creditPayPlan = $creditPayPlan;
    }

    /**
     * @return mixed
     */
    public function getMerchantRegion()
    {
        return $this->merchantRegion;
    }

    /**
     * @param mixed $merchantRegion
     */
    public function setMerchantRegion($merchantRegion)
    {
        $this->merchantRegion = $merchantRegion;
    }

    /**
     * @return mixed
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @param mixed $env
     */
    public function setEnv($env)
    {
        $this->env = $env;
    }

    /**
     * @return mixed
     */
    public function getAgreementInfo()
    {
        return $this->agreementInfo;
    }

    /**
     * @param mixed $agreementInfo
     */
    public function setAgreementInfo($agreementInfo)
    {
        $this->agreementInfo = $agreementInfo;
    }

    /**
     * @return mixed
     */
    public function getRiskData()
    {
        return $this->riskData;
    }

    /**
     * @param mixed $riskData
     */
    public function setRiskData($riskData)
    {
        $this->riskData = $riskData;
    }

    /**
     * @return mixed
     */
    public function getProductScene()
    {
        return $this->productScene;
    }

    /**
     * @param mixed $productScene
     */
    public function setProductScene($productScene)
    {
        $this->productScene = $productScene;
    }

    /**
     * @return mixed
     */
    public function getSavedPaymentMethods()
    {
        return $this->savedPaymentMethods;
    }

    /**
     * @param mixed $savedPaymentMethods
     */
    public function setSavedPaymentMethods($savedPaymentMethods)
    {
        $this->savedPaymentMethods = $savedPaymentMethods;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param mixed $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }


}
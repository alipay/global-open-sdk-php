<?php

namespace Model;

class PaymentFactor
{

    public $isPaymentEvaluation;
    public $inStorePaymentScenario;
    public $presentmentMode;

    public $captureMode;

    public $isAuthorization;

    /**
     * @return mixed
     */
    public function getIsPaymentEvaluation()
    {
        return $this->isPaymentEvaluation;
    }

    /**
     * @param mixed $isPaymentEvaluation
     */
    public function setIsPaymentEvaluation($isPaymentEvaluation)
    {
        $this->isPaymentEvaluation = $isPaymentEvaluation;
    }

    /**
     * @return mixed
     */
    public function getInStorePaymentScenario()
    {
        return $this->inStorePaymentScenario;
    }

    /**
     * @param mixed $inStorePaymentScenario
     */
    public function setInStorePaymentScenario($inStorePaymentScenario)
    {
        $this->inStorePaymentScenario = $inStorePaymentScenario;
    }

    /**
     * @return mixed
     */
    public function getPresentmentMode()
    {
        return $this->presentmentMode;
    }

    /**
     * @param mixed $presentmentMode
     */
    public function setPresentmentMode($presentmentMode)
    {
        $this->presentmentMode = $presentmentMode;
    }

    /**
     * @return mixed
     */
    public function getIsAuthorization()
    {
        return $this->isAuthorization;
    }

    /**
     * @param mixed $isAuthorization
     */
    public function setIsAuthorization($isAuthorization)
    {
        $this->isAuthorization = $isAuthorization;
    }

    /**
     * @return mixed
     */
    public function getCaptureMode()
    {
        return $this->captureMode;
    }

    /**
     * @param mixed $captureMode
     */
    public function setCaptureMode($captureMode)
    {
        $this->captureMode = $captureMode;
    }


}
<?php
class PaymentFactor{

    public $isPaymentEvaluation;
    public $inStorePaymentScenario;

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

}
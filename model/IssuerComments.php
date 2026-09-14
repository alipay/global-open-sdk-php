<?php

namespace Model;

class IssuerComments
{
    public $cardholderComments;
    public $reasonOfInvalidAuthorization;
    public $explanationOfCreditPresented;
    public $judgeReason;

    public function getCardholderComments()
    {
        return $this->cardholderComments;
    }

    public function setCardholderComments($cardholderComments)
    {
        $this->cardholderComments = $cardholderComments;
    }

    public function getReasonOfInvalidAuthorization()
    {
        return $this->reasonOfInvalidAuthorization;
    }

    public function setReasonOfInvalidAuthorization($reasonOfInvalidAuthorization)
    {
        $this->reasonOfInvalidAuthorization = $reasonOfInvalidAuthorization;
    }

    public function getExplanationOfCreditPresented()
    {
        return $this->explanationOfCreditPresented;
    }

    public function setExplanationOfCreditPresented($explanationOfCreditPresented)
    {
        $this->explanationOfCreditPresented = $explanationOfCreditPresented;
    }

    public function getJudgeReason()
    {
        return $this->judgeReason;
    }

    public function setJudgeReason($judgeReason)
    {
        $this->judgeReason = $judgeReason;
    }
}

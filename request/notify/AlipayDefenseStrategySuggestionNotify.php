<?php

namespace Request\notify;

class AlipayDefenseStrategySuggestionNotify extends AlipayNotify
{
    /** @var string|null Dispute ID. */
    public $disputeId;

    /** @var string|null Notification time as an ISO 8601 string with timezone. */
    public $notifyTime;

    /** @var string|null Predicted win-rate level: HIGH, MEDIUM or LOW. */
    public $winRateLevel;

    /** @var \Model\DisputeEvidenceRecommendation[]|null Recommended evidence items, from 1 to 32 entries. */
    public $evidenceList;

    /** @var string|null Optional cardholder dispute reason. */
    public $cardholderDisputeReason;

    /** @var string|null Suggested defense strategy. */
    public $defenseStrategyDescription;

    /** @return string|null */
    public function getDisputeId()
    {
        return $this->disputeId;
    }

    /** @param string|null $disputeId */
    public function setDisputeId($disputeId)
    {
        $this->disputeId = $disputeId;
    }

    /** @return string|null */
    public function getNotifyTime()
    {
        return $this->notifyTime;
    }

    /** @param string|null $notifyTime */
    public function setNotifyTime($notifyTime)
    {
        $this->notifyTime = $notifyTime;
    }

    /** @return string|null */
    public function getWinRateLevel()
    {
        return $this->winRateLevel;
    }

    /** @param string|null $winRateLevel */
    public function setWinRateLevel($winRateLevel)
    {
        $this->winRateLevel = $winRateLevel;
    }

    /** @return \Model\DisputeEvidenceRecommendation[]|null */
    public function getEvidenceList()
    {
        return $this->evidenceList;
    }

    /** @param \Model\DisputeEvidenceRecommendation[]|null $evidenceList */
    public function setEvidenceList($evidenceList)
    {
        $this->evidenceList = $evidenceList;
    }

    /** @return string|null */
    public function getCardholderDisputeReason()
    {
        return $this->cardholderDisputeReason;
    }

    /** @param string|null $cardholderDisputeReason */
    public function setCardholderDisputeReason($cardholderDisputeReason)
    {
        $this->cardholderDisputeReason = $cardholderDisputeReason;
    }

    /** @return string|null */
    public function getDefenseStrategyDescription()
    {
        return $this->defenseStrategyDescription;
    }

    /** @param string|null $defenseStrategyDescription */
    public function setDefenseStrategyDescription($defenseStrategyDescription)
    {
        $this->defenseStrategyDescription = $defenseStrategyDescription;
    }

}

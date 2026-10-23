<?php

namespace Request\notify;

class AlipayDefenseDocumentNotify extends AlipayNotify
{
    /** @var string|null Dispute ID. */
    public $disputeId;

    /** @var string|null Notification time as an ISO 8601 string with timezone. */
    public $notifyTime;

    /** @var \Model\DisputeDefenseFile|null Metadata of the generated material; the file body is not included. */
    public $defenseFile;

    /** @var string|null Optional predicted win-rate level of this material. */
    public $winRateLevel;

    /** @var array<string,string>|null Optional evidence tags mapped to requirement descriptions. */
    public $recommendedEvidence;

    /** @var string|null Optional suggestions for improving the defense material. */
    public $suggestionsForImprovement;

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

    /** @return \Model\DisputeDefenseFile|null */
    public function getDefenseFile()
    {
        return $this->defenseFile;
    }

    /** @param \Model\DisputeDefenseFile|null $defenseFile */
    public function setDefenseFile($defenseFile)
    {
        $this->defenseFile = $defenseFile;
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

    /** @return array<string,string>|null */
    public function getRecommendedEvidence()
    {
        return $this->recommendedEvidence;
    }

    /** @param array<string,string>|null $recommendedEvidence */
    public function setRecommendedEvidence($recommendedEvidence)
    {
        $this->recommendedEvidence = $recommendedEvidence;
    }

    /** @return string|null */
    public function getSuggestionsForImprovement()
    {
        return $this->suggestionsForImprovement;
    }

    /** @param string|null $suggestionsForImprovement */
    public function setSuggestionsForImprovement($suggestionsForImprovement)
    {
        $this->suggestionsForImprovement = $suggestionsForImprovement;
    }

}

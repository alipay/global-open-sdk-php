<?php

namespace Model;

class DisputeEvidenceRecommendation
{
    /** @var string|null Evidence tag. */
    public $evidenceTag;

    /** @var bool|null Whether Antom has already obtained this evidence. */
    public $obtained;

    /** @var string|null Optional contribution level: HIGH, MEDIUM or LOW. */
    public $winRateContribution;

    /** @return string|null */
    public function getEvidenceTag()
    {
        return $this->evidenceTag;
    }

    /** @param string|null $evidenceTag */
    public function setEvidenceTag($evidenceTag)
    {
        $this->evidenceTag = $evidenceTag;
    }

    /** @return bool|null */
    public function getObtained()
    {
        return $this->obtained;
    }

    /** @param bool|null $obtained */
    public function setObtained($obtained)
    {
        $this->obtained = $obtained;
    }

    /** @return string|null */
    public function getWinRateContribution()
    {
        return $this->winRateContribution;
    }

    /** @param string|null $winRateContribution */
    public function setWinRateContribution($winRateContribution)
    {
        $this->winRateContribution = $winRateContribution;
    }

}

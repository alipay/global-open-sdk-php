<?php

namespace Model;

class PeriodRule
{
    public $periodType;

    public $periodCount;

    /**
     * @return mixed
     */
    public function getPeriodType()
    {
        return $this->periodType;
    }

    /**
     * @param mixed $periodType
     */
    public function setPeriodType($periodType)
    {
        $this->periodType = $periodType;
    }

    /**
     * @return mixed
     */
    public function getPeriodCount()
    {
        return $this->periodCount;
    }

    /**
     * @param mixed $periodCount
     */
    public function setPeriodCount($periodCount)
    {
        $this->periodCount = $periodCount;
    }


}
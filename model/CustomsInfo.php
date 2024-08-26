<?php

class CustomsInfo
{
    public  $customsCode;
    public  $region;

    /**
     * @return mixed
     */
    public function getCustomsCode()
    {
        return $this->customsCode;
    }

    /**
     * @param mixed $customsCode
     */
    public function setCustomsCode($customsCode): void
    {
        $this->customsCode = $customsCode;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region): void
    {
        $this->region = $region;
    }


}
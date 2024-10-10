<?php

namespace Model;

class BusinessInfo
{
    public $mcc;
    public $websites;
    public $englishName;
    public $doingBusinessAs;
    public $mainSalesCountry;
    public $appName;
    public $serviceDescription;

    /**
     * @return mixed
     */
    public function getMcc()
    {
        return $this->mcc;
    }

    /**
     * @param mixed $mcc
     */
    public function setMcc($mcc): void
    {
        $this->mcc = $mcc;
    }

    /**
     * @return mixed
     */
    public function getWebsites()
    {
        return $this->websites;
    }

    /**
     * @param mixed $websites
     */
    public function setWebsites($websites): void
    {
        $this->websites = $websites;
    }

    /**
     * @return mixed
     */
    public function getEnglishName()
    {
        return $this->englishName;
    }

    /**
     * @param mixed $englishName
     */
    public function setEnglishName($englishName): void
    {
        $this->englishName = $englishName;
    }

    /**
     * @return mixed
     */
    public function getDoingBusinessAs()
    {
        return $this->doingBusinessAs;
    }

    /**
     * @param mixed $doingBusinessAs
     */
    public function setDoingBusinessAs($doingBusinessAs): void
    {
        $this->doingBusinessAs = $doingBusinessAs;
    }

    /**
     * @return mixed
     */
    public function getMainSalesCountry()
    {
        return $this->mainSalesCountry;
    }

    /**
     * @param mixed $mainSalesCountry
     */
    public function setMainSalesCountry($mainSalesCountry): void
    {
        $this->mainSalesCountry = $mainSalesCountry;
    }

    /**
     * @return mixed
     */
    public function getAppName()
    {
        return $this->appName;
    }

    /**
     * @param mixed $appName
     */
    public function setAppName($appName): void
    {
        $this->appName = $appName;
    }

    /**
     * @return mixed
     */
    public function getServiceDescription()
    {
        return $this->serviceDescription;
    }

    /**
     * @param mixed $serviceDescription
     */
    public function setServiceDescription($serviceDescription): void
    {
        $this->serviceDescription = $serviceDescription;
    }



}
<?php

namespace Model;

class Env
{

    public $terminalType;
    public $osType;
    public $userAgent;
    public $deviceTokenId;
    public $clientIp;
    public $cookieId;
    public $storeTerminalId;
    public $storeTerminalRequestTime;

    public $extendInfo;
    public $browserInfo;
    public $colorDepth;
    public $screenHeight;
    public $screenWidth;
    public $timeZoneOffset;
    public $deviceBrand;
    public $deviceModel;
    public $deviceLanguage;
    public $deviceId;

    /**
     * @return String
     */
    public function getTerminalType()
    {
        return $this->terminalType;
    }

    /**
     * @param String $terminalType
     */
    public function setTerminalType($terminalType)
    {
        $this->terminalType = $terminalType;
    }

    /**
     * @return OsType
     */
    public function getOsType()
    {
        return $this->osType;
    }

    /**
     * @param OsType $osType
     */
    public function setOsType($osType)
    {
        $this->osType = $osType;
    }

    /**
     * @return String
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @param String $userAgent
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    /**
     * @return String
     */
    public function getDeviceTokenId()
    {
        return $this->deviceTokenId;
    }

    /**
     * @param String $deviceTokenId
     */
    public function setDeviceTokenId($deviceTokenId)
    {
        $this->deviceTokenId = $deviceTokenId;
    }

    /**
     * @return String
     */
    public function getClientIp()
    {
        return $this->clientIp;
    }

    /**
     * @param String $clientIp
     */
    public function setClientIp($clientIp)
    {
        $this->clientIp = $clientIp;
    }

    /**
     * @return String
     */
    public function getCookieId()
    {
        return $this->cookieId;
    }

    /**
     * @param String $cookieId
     */
    public function setCookieId($cookieId)
    {
        $this->cookieId = $cookieId;
    }

    /**
     * @return String
     */
    public function getStoreTerminalId()
    {
        return $this->storeTerminalId;
    }

    /**
     * @param String $storeTerminalId
     */
    public function setStoreTerminalId($storeTerminalId)
    {
        $this->storeTerminalId = $storeTerminalId;
    }

    /**
     * @return String
     */
    public function getStoreTerminalRequestTime()
    {
        return $this->storeTerminalRequestTime;
    }

    /**
     * @param String $storeTerminalRequestTime
     */
    public function setStoreTerminalRequestTime($storeTerminalRequestTime)
    {
        $this->storeTerminalRequestTime = $storeTerminalRequestTime;
    }

    /**
     * @return String
     */
    public function getExtendInfo()
    {
        return $this->extendInfo;
    }

    /**
     * @param String $extendInfo
     */
    public function setExtendInfo($extendInfo)
    {
        $this->extendInfo = $extendInfo;
    }

    /**
     * @return mixed
     */
    public function getBrowserInfo()
    {
        return $this->browserInfo;
    }

    /**
     * @param mixed $browserInfo
     */
    public function setBrowserInfo($browserInfo)
    {
        $this->browserInfo = $browserInfo;
    }

    /**
     * @return mixed
     */
    public function getColorDepth()
    {
        return $this->colorDepth;
    }

    /**
     * @param mixed $colorDepth
     */
    public function setColorDepth($colorDepth)
    {
        $this->colorDepth = $colorDepth;
    }

    /**
     * @return mixed
     */
    public function getScreenHeight()
    {
        return $this->screenHeight;
    }

    /**
     * @param mixed $screenHeight
     */
    public function setScreenHeight($screenHeight)
    {
        $this->screenHeight = $screenHeight;
    }

    /**
     * @return mixed
     */
    public function getScreenWidth()
    {
        return $this->screenWidth;
    }

    /**
     * @param mixed $screenWidth
     */
    public function setScreenWidth($screenWidth)
    {
        $this->screenWidth = $screenWidth;
    }

    /**
     * @return mixed
     */
    public function getTimeZoneOffset()
    {
        return $this->timeZoneOffset;
    }

    /**
     * @param mixed $timeZoneOffset
     */
    public function setTimeZoneOffset($timeZoneOffset)
    {
        $this->timeZoneOffset = $timeZoneOffset;
    }

    /**
     * @return mixed
     */
    public function getDeviceBrand()
    {
        return $this->deviceBrand;
    }

    /**
     * @param mixed $deviceBrand
     */
    public function setDeviceBrand($deviceBrand)
    {
        $this->deviceBrand = $deviceBrand;
    }

    /**
     * @return mixed
     */
    public function getDeviceModel()
    {
        return $this->deviceModel;
    }

    /**
     * @param mixed $deviceModel
     */
    public function setDeviceModel($deviceModel)
    {
        $this->deviceModel = $deviceModel;
    }

    /**
     * @return mixed
     */
    public function getDeviceLanguage()
    {
        return $this->deviceLanguage;
    }

    /**
     * @param mixed $deviceLanguage
     */
    public function setDeviceLanguage($deviceLanguage)
    {
        $this->deviceLanguage = $deviceLanguage;
    }

    /**
     * @return mixed
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * @param mixed $deviceId
     */
    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
    }

}
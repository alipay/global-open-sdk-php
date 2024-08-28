<?php

namespace Model;
class BrowserInfo
{

    /**
     * The accept header of the user's browser
     */
    public $acceptHeader;

    /**
     * Indicates whether the user's browser is able to run Java
     */
    public $javaEnabled;

    /**
     * Indicates whether the user's browser is able to run Java
     */
    public $javaScriptEnabled;

    /**
     * The language of the user's browser
     */
    public $language;

    /**
     * The user agent of the user's browser
     */
    public $userAgent;

    /**
     * @return mixed
     */
    public function getAcceptHeader()
    {
        return $this->acceptHeader;
    }

    /**
     * @param mixed $acceptHeader
     */
    public function setAcceptHeader($acceptHeader)
    {
        $this->acceptHeader = $acceptHeader;
    }

    /**
     * @return mixed
     */
    public function getJavaEnabled()
    {
        return $this->javaEnabled;
    }

    /**
     * @param mixed $javaEnabled
     */
    public function setJavaEnabled($javaEnabled)
    {
        $this->javaEnabled = $javaEnabled;
    }

    /**
     * @return mixed
     */
    public function getJavaScriptEnabled()
    {
        return $this->javaScriptEnabled;
    }

    /**
     * @param mixed $javaScriptEnabled
     */
    public function setJavaScriptEnabled($javaScriptEnabled)
    {
        $this->javaScriptEnabled = $javaScriptEnabled;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @param mixed $userAgent
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }


}
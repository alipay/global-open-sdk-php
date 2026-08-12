<?php

namespace Request;

/** Base request accepted only by DefaultAlipayClient::uploadFile(). */
abstract class AlipayFileRequest
{
    private $file;
    private $clientId;
    private $keyVersion;

    /**
     * @return \CURLFile|resource|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Accepts a CURLFile or a readable plain-file stream. The SDK does not close it.
     *
     * @param \CURLFile|resource $file
     * @return self
     */
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    public function getKeyVersion()
    {
        return $this->keyVersion;
    }

    public function setKeyVersion($keyVersion)
    {
        $this->keyVersion = $keyVersion;
        return $this;
    }
}

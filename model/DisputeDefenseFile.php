<?php

namespace Model;

class DisputeDefenseFile
{
    /** @var string|null Name of the generated defense material. */
    public $fileName;

    /** @var string|null Material format: PDF or WORD. */
    public $fileFormat;

    /** @var string|null MD5 of the material body as 32 lowercase hexadecimal characters. */
    public $fileMd5;

    /** @return string|null */
    public function getFileName()
    {
        return $this->fileName;
    }

    /** @param string|null $fileName */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /** @return string|null */
    public function getFileFormat()
    {
        return $this->fileFormat;
    }

    /** @param string|null $fileFormat */
    public function setFileFormat($fileFormat)
    {
        $this->fileFormat = $fileFormat;
    }

    /** @return string|null */
    public function getFileMd5()
    {
        return $this->fileMd5;
    }

    /** @param string|null $fileMd5 */
    public function setFileMd5($fileMd5)
    {
        $this->fileMd5 = $fileMd5;
    }

}

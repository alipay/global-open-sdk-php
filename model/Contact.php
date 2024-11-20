<?php

namespace Model;

class Contact
{
    public $type;
    public $info;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type) 
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info) 
    {
        $this->info = $info;
    }



}
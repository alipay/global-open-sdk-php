<?php

namespace Model;

class Individual
{
 public $name;
 public $englishName;

 public $dateOfBirth;

 public $placeOfBirth;

 public $certificates;

 public $nationality;

 public $contacts;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) 
    {
        $this->name = $name;
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
    public function setEnglishName($englishName) 
    {
        $this->englishName = $englishName;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param mixed $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth) 
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return mixed
     */
    public function getPlaceOfBirth()
    {
        return $this->placeOfBirth;
    }

    /**
     * @param mixed $placeOfBirth
     */
    public function setPlaceOfBirth($placeOfBirth) 
    {
        $this->placeOfBirth = $placeOfBirth;
    }

    /**
     * @return mixed
     */
    public function getCertificates()
    {
        return $this->certificates;
    }

    /**
     * @param mixed $certificates
     */
    public function setCertificates($certificates) 
    {
        $this->certificates = $certificates;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality
     */
    public function setNationality($nationality) 
    {
        $this->nationality = $nationality;
    }

    /**
     * @return mixed
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param mixed $contacts
     */
    public function setContacts($contacts) 
    {
        $this->contacts = $contacts;
    }




}
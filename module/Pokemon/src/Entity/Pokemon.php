<?php

namespace Pokemon\Entity;

class Pokemon
{
    protected $id;

    protected $national_id;

    protected $name;

    protected $description;

    public function setId($id)
    {
      $this->id = $id;
    }

    public function getId()
    {
      return $this->id;
    }

    public function getNationalId()
    {
      return $this->national_id;
    }

    public function setNationalId($national_id)
    {
      $this->national_id = $national_id;
    }

    public function getName()
    {
      return $this->name;
    }

    public function setName($name)
    {
      $this->name = $name;
    }

    public function getDescription()
    {
      return $this->description;
    }

    public function setDescription($description)
    {
      $this->description = $description;
    }
}

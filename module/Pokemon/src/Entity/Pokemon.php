<?php

namespace Pokemon\Entity;

class Pokemon
{
  protected $id;

  protected $national_id;

  protected $name;

  protected $description;

  protected $type1;

  protected $type2;

  protected $previous_pokemon;

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
  
  public function getType1()
  {
    return $this->type1;
  }

  public function setType1($type1)
  {
    $this->type1 = $type1;
  }
  
  public function getType2()
  {
    return $this->type2;
  }

  public function setType2($type2)
  {
    $this->type2 = $type2;
  }

  public function getPreviousPokemon()
  {
    return $this->previous_pokemon;
  }

  public function setPreviousPokemon($previous_pokemon)
  {
    $this->previous_pokemon = $previous_pokemon;
  }
}

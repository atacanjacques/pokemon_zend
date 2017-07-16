<?php

namespace Type\Entity;

class Type
{
    protected $id;

    protected $name;

    protected $color1;

    protected $color2;

    public function setId($id)
    {
      $this->id = $id;
    }

    public function getId()
    {
      return $this->id;
    }

    public function getName()
    {
      return $this->name;
    }

    public function setName($name)
    {
      $this->name = $name;
    }


    public function getColor1()
    {
      return $this->color1;
    }

    public function setColor1($color1)
    {
      $this->color1 = $color1;
    }

    public function getColor2()
    {
      return $this->color2;
    }

    public function setColor2($color2)
    {
      $this->color2 = $color2;
    }
}

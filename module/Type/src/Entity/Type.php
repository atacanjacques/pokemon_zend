<?php

namespace Type\Entity;

class Type
{
    protected $id;

    protected $name;

    protected $color;

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


    public function getColor()
    {
      return $this->color;
    }

    public function setColor($color)
    {
      $this->color = $color;
    }
}

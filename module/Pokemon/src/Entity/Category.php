<?php

namespace Blog\Entity;

class Category
{
    protected $id;

    protected $name;

    protected $slug;

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

    public function getSlug()
    {
      return $this->slug;
    }

    public function setSlug($slug)
    {
      $this->slug = $slug;
    }
}

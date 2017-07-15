<?php

namespace Location\Entity;

class Location
{
    protected $id;

    protected $pokemon;

    protected $lat;

    protected $long;

    protected $created_at;

    public function setId($id)
    {
      $this->id = $id;
    }

    public function getId()
    {
      return $this->id;
    }

    public function getPokemon()
    {
      return $this->pokemon;
    }

    public function setPokemon($pokemon)
    {
      $this->pokemon = $pokemon;
    }

    public function getLat()
    {
      return $this->lat;
    }

    public function setLat($lat)
    {
      $this->lat = $lat;
    }

    public function getLong()
    {
      return $this->long;
    }

    public function setLong($long)
    {
      $this->long = $long;
    }

    public function getCreatedAt()
    {
      return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
      $this->created_at = $created_at;
    }
}

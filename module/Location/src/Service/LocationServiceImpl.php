<?php

namespace Location\Service;

use Location\Entity\Location;
use Location\Service\LocationService;

class LocationServiceImpl implements LocationService
{
  protected $locationRepository;

  public function getLocationRepository()
  {
    return $this->locationRepository;
  }

  public function setLocationRepository($locationRepository)
  {
    $this->locationRepository = $locationRepository;
  }

  public function save(Location $location)
  {
    $this->locationRepository->save($location);
  }

  public function fetchAll()
  {
    return $this->locationRepository->fetchAll();
  }

  public function fetchAllRecentAndPokemonId($pokemonid)
  {
    return $this->locationRepository->fetchAllRecentAndPokemonId($pokemonid);
  }

  public function fetch($page)
  {
    return $this->locationRepository->fetch($page);
  }

  public function find($locationId)
  {
    return $this->locationRepository->find($locationId);
  }

  public function findById($locationId)
  {
    return $this->locationRepository->findById($locationId);
  }

  public function update(Location $location)
  {
    $this->locationRepository->update($location);
  }

  public function delete($locationId)
  {
    $this->locationRepository->delete($locationId);
  }
}

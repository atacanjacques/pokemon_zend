<?php

namespace Location\Service;

use Location\Entity\Location;

interface LocationService
{
  public function save(Location $location);

  public function fetchAll();

  public function fetchAllRecentAndPokemonId($pokemonid);

  public function fetch($page);

  public function find($locationId);

  public function findById($locationId);

  public function update(Location $location);

  public function delete($locationId);
}

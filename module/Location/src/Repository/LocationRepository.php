<?php

namespace Location\Repository;

use Application\Repository\RepositoryInterface;
use Location\Entity\Location;

interface LocationRepository extends RepositoryInterface
{
  public function save(Location $location);

  public function fetchAll();

  public function fetch($page);

  public function find($locationName);

  public function findById($locationId);

  public function update(Location $location);

  public function delete($locationId);
}

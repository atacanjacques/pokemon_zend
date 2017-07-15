<?php

namespace Location\Entity\Hydrator;

use Location\Entity\Location;
use Zend\Hydrator\HydratorInterface;

class LocationHydrator implements HydratorInterface
{
  public function extract($object)
  {
      if (!$object instanceof Location) {
        return [];
      }

      return [
        'id'        => $object->getId(),
        'pokemon'      => $object->getPokemon(),
        'lat'      => $object->getLat(),
        'long'      => $object->getLong(),
        'created_at'      => $object->getCreatedAt()
      ];
  }

  public function hydrate(array $data, $object)
  {
    if (!$object instanceof Location) {
      return $object;
    }

    $object->setId(isset($data['id']) ? intval($data['id']) : null);
    $object->setPokemon(isset($data['pokemon']) ? $data['pokemon'] : null);
    $object->setLat(isset($data['lat']) ? $data['lat'] : null);
    $object->setLong(isset($data['long']) ? $data['long'] : null);
    $object->setCreatedAt(isset($data['created_at']) ? $data['created_at'] : null);

    return $object;
  }
}

<?php

namespace Pokedex\Entity\Hydrator;

use Pokedex\Entity\Pokemon;
use Zend\Hydrator\HydratorInterface;

class PokemonHydrator implements HydratorInterface
{
  public function extract($object)
  {
      if (!$object instanceof Pokemon) {
        return [];
      }

      return [
        'id'        => $object->getId(),
        'national_id'     => $object->getNationalId(),
        'name'      => $object->getName(),
        'description'   => $object->getDescription(),
      ];
  }

  public function hydrate(array $data, $object)
  {
    if (!$object instanceof Pokemon) {
      return $object;
    }

    $object->setId(isset($data['id']) ? intval($data['id']) : null);
    $object->setNationalId(isset($data['national_id']) ? $data['national_id'] : null);
    $object->setName(isset($data['name']) ? $data['name'] : null);
    $object->setDescription(isset($data['description']) ? $data['description'] : null);

    return $object;
  }
}

<?php

namespace Pokemon\Entity\Hydrator;

use Pokemon\Entity\Pokemon;
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
        'type1'   => $object->getType1(),
        'type2'   => $object->getType2(),
        'previous_pokemon'   => $object->getPreviousPokemon(),
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
    $object->setType1(isset($data['type1']) ? $data['type1'] : null);
    $object->setType2(isset($data['type2']) ? $data['type2'] : null);
    $object->setPreviousPokemon(isset($data['previous_pokemon']) ? $data['previous_pokemon'] : null);

    return $object;
  }
}

<?php

namespace Type\Entity\Hydrator;

use Type\Entity\Type;
use Zend\Hydrator\HydratorInterface;

class TypeHydrator implements HydratorInterface
{
  public function extract($object)
  {
      if (!$object instanceof Type) {
        return [];
      }

      return [
        'id'        => $object->getId(),
        'name'      => $object->getName(),
        'color'      => $object->getColor()
      ];
  }

  public function hydrate(array $data, $object)
  {
    if (!$object instanceof Type) {
      return $object;
    }

    $object->setId(isset($data['id']) ? intval($data['id']) : null);
    $object->setName(isset($data['name']) ? $data['name'] : null);
    $object->setColor(isset($data['color']) ? $data['color'] : null);

    return $object;
  }
}

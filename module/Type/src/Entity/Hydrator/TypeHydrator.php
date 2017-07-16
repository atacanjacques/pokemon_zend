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
        'color1'      => $object->getColor1(),
        'color2'      => $object->getColor2()
      ];
  }

  public function hydrate(array $data, $object)
  {
    if (!$object instanceof Type) {
      return $object;
    }

    $object->setId(isset($data['id']) ? intval($data['id']) : null);
    $object->setName(isset($data['name']) ? $data['name'] : null);
    $object->setColor1(isset($data['color1']) ? $data['color1'] : null);
    $object->setColor2(isset($data['color2']) ? $data['color2'] : null);

    return $object;
  }
}

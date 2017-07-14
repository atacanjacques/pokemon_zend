<?php

namespace Blog\Entity\Hydrator;

use Blog\Entity\Post;
use Blog\Entity\Category;
use Zend\Hydrator\HydratorInterface;

class CategoryHydrator implements HydratorInterface
{
  public function extract($object)
  {
      if (!$object instanceof Post || $object->getCategory() == null) {
        return [];
      }

      $category = $object->getCategory();

      return [
        'id'        => $category->getId(),
        'name'      => $category->getName(),
        'slug'      => $category->getSlug()
      ];
  }

  public function hydrate(array $data, $object)
  {
    if (!$object instanceof Post) {
      return $object;
    }

    $category = new Category();

    $category->setId(isset($data['category_id']) ? intval($data['category_id']) : null);
    $category->setName(isset($data['name']) ? $data['name'] : null);
    $category->setSlug(isset($data['category_slug']) ? $data['category_slug'] : null);

    $object->setCategory($category);

    return $object;
  }
}

<?php

namespace Type\Service;

use Type\Entity\Type;
use Type\Service\TypeService;

class TypeServiceImpl implements TypeService
{
  protected $typeRepository;

  public function getTypeRepository()
  {
      return $this->typeRepository;
  }

  public function setTypeRepository($typeRepository)
  {
    $this->typeRepository = $typeRepository;
  }

  public function save(Type $type)
  {
    $this->typeRepository->save($type);
  }

  public function fetchAll()
  {
    return $this->typeRepository->fetchAll();
  }

  public function fetch($page)
  {
    return $this->typeRepository->fetch($page);
  }

  public function find($typeName)
  {
    return $this->typeRepository->find($typeName);
  }

  public function findById($typeId)
  {
    return $this->typeRepository->findById($typeId);
  }

  public function update(Type $type)
  {
    $this->typeRepository->update($type);
  }

  public function delete($typeId)
  {
    $this->typeRepository->delete($typeId);
  }
}

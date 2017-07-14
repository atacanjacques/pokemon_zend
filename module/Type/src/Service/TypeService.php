<?php

namespace Type\Service;

use Type\Entity\Type;

interface TypeService
{
  public function save(Type $type);

  public function fetchAll();

  public function fetch($page);

  public function find($typeName);

  public function findById($typeId);

  public function update(Type $type);

  public function delete($typeId);
}

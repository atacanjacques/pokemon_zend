<?php

namespace Type\Repository;

use Type\Entity\Hydrator\TypeHydrator;
use Zend\Hydrator\Aggregate\AggregateHydrator;
use Zend\Db\ResultSet\HydratingResultSet;
use Type\Repository\TypeRepository;
use Zend\Db\Adapter\AdapterAwareTrait;
use Type\Entity\Type;

class TypeRepositoryImpl implements TypeRepository
{
  use AdapterAwareTrait;

  public function save(Type $type)
  {
      try {
          $this->adapter
            ->getDriver()
            ->getConnection()
            ->beginTransaction();

      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $insert = $sql->insert()
        ->values([
          'name'  => $type->getName(),
          'color'  => $type->getColor()
        ])
        ->into('type');
     $statement = $sql->prepareStatementForSqlObject($insert);
     $statement->execute();
     $this->adapter->getDriver()
      ->getConnection()
      ->commit();
   } catch (\Exception $e) {
        $this->adapter->getDriver()
          ->getConnection()->rollback();
   }
  }

  public function fetchAll()
  {
      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $select = $sql->select();
      $select->columns([
          'id',
          'name',
          'color'
      ])->from([
        't' => 'type'
      ]);

      $statement = $sql->prepareStatementForSqlObject($select);
      $result = $statement->execute();

      $hydrator = new AggregateHydrator();
      $hydrator->add(new TypeHydrator());
      $resultSet = new HydratingResultSet($hydrator, new Type());
      $resultSet->initialize($result);

      $types = [];
      foreach($resultSet as $type) {
          /**
           * @var \Type\Entity\Type $type
           */
          $types[] = $type;
      }
      return $types;
  }

  public function fetch($page)
  {
      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $select = $sql->select();
      $select->columns([
          'id',
          'name',
          'color'
      ])->from([
        't' => 'type'
      ]);

      $hydrator = new AggregateHydrator();
      $hydrator->add(new TypeHydrator());
      $resultSet = new HydratingResultSet($hydrator, new Type());

        $paginatorAdapter = new \Zend\Paginator\Adapter\DbSelect(
            $select,
            $this->adapter,
            $resultSet
          );
          $paginator = new \Zend\Paginator\Paginator($paginatorAdapter);
          $paginator->setCurrentPageNumber($page);
          $paginator->setItemCountPerPage(5);

          return $paginator;
  }

  public function find($typeName)
  {
      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $select = $sql->select();
      $select->columns([
          'id',
          'name',
          'color'
      ])->from([
        't' => 'type'
      ])
->where(
        ['t.name' => $typeName]
      );

      $statement = $sql->prepareStatementForSqlObject($select);
      $results = $statement->execute();

      $hydrator = new AggregateHydrator();
      $hydrator->add(new TypeHydrator());

      $resultSet = new HydratingResultSet($hydrator, new Type());
      $resultSet->initialize($results);

      return ($resultSet->count() ? $resultSet->current() : null);
  }

  public function findById($typeId)
  {
    $sql = new \Zend\Db\Sql\Sql($this->adapter);
    $select = $sql->select();
    $select->columns([
          'id',
          'name',
          'color'
      ])->from([
        't' => 'type'
      ])
->where(
      [ 't.id' => $typeId ]
    );

    $statement = $sql->prepareStatementForSqlObject($select);
    $results = $statement->execute();

    $hydrator = new AggregateHydrator();
    $hydrator->add(new TypeHydrator());

    $resultSet = new HydratingResultSet($hydrator, new Type());
    $resultSet->initialize($results);

    return ($resultSet->count() ? $resultSet->current() : null);
  }

  public function update(Type $type)
  {
    $sql = new \Zend\Db\Sql\Sql($this->adapter);
    $update = $sql->update('type')
      ->set([
        'name'        => $type->getName(),
          'color'  => $type->getColor()
      ])->where([
        'id' => $type->getId()
      ]);

      $statement = $sql->prepareStatementForSqlObject($update);
      $statement->execute();
  }

  public function delete($typeId)
  {
      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $delete = $sql->delete()
        ->from('type')
        ->where([
          'id' => $typeId
        ]);

        $statement = $sql->prepareStatementForSqlObject($delete);
        $statement->execute();
  }
}

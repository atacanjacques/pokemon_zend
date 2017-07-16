<?php

namespace Location\Repository;

use Location\Entity\Hydrator\LocationHydrator;
use Zend\Hydrator\Aggregate\AggregateHydrator;
use Zend\Db\ResultSet\HydratingResultSet;
use Location\Repository\LocationRepository;
use Zend\Db\Adapter\AdapterAwareTrait;
use Location\Entity\Location;

class LocationRepositoryImpl implements LocationRepository
{
  use AdapterAwareTrait;

  public function save(Location $location)
  {
      try {
          $this->adapter
            ->getDriver()
            ->getConnection()
            ->beginTransaction();

      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $insert = $sql->insert()
        ->values([
        'pokemon'      => $location->getPokemon(),
        'lat'      => $location->getLat(),
        'long'      => $location->getLong()
        ])
        ->into('location');
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
          'pokemon',
          'lat',
          'long',
          'created_at'
      ])->from([
        'l' => 'location'
      ]);

      $statement = $sql->prepareStatementForSqlObject($select);
      $result = $statement->execute();

      $hydrator = new AggregateHydrator();
      $hydrator->add(new LocationHydrator());
      $resultSet = new HydratingResultSet($hydrator, new Location());
      $resultSet->initialize($result);

      $locations = [];
      foreach($resultSet as $location) {
          /**
           * @var \Location\Entity\Location $location
           */
          $locations[] = $location;
      }
      return $locations;
  }

  public function fetchAllRecentAndPokemonId($pokemonId)
  {
    $date = date('Y-m-d H:i:s');
    $date = strtotime($date . ' -30 minutes');
    $date = date('Y-m-d H:i:s', $date);

      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $select = $sql->select();
      $select->columns([
          'id',
          'pokemon',
          'lat',
          'long',
          'created_at'
      ])->from([
        'l' => 'location'
      ])
      ->where(
        [
        'l.pokemon' => $pokemonId, 
        "l.created_at >= '" . $date . "'"
        ]
      );

      $statement = $sql->prepareStatementForSqlObject($select);
      $result = $statement->execute();

      $hydrator = new AggregateHydrator();
      $hydrator->add(new LocationHydrator());
      $resultSet = new HydratingResultSet($hydrator, new Location());
      $resultSet->initialize($result);

      $locations = [];
      foreach($resultSet as $location) {
          /**
           * @var \Location\Entity\Location $location
           */
          $locations[] = $location;
      }
      return $locations;
  }

  public function fetch($page)
  {
      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $select = $sql->select();
      $select->columns([
          'id',
          'pokemon',
          'lat',
          'long',
          'created_at'
      ])->from([
        'l' => 'location'
      ]);

      $hydrator = new AggregateHydrator();
      $hydrator->add(new LocationHydrator());
      $resultSet = new HydratingResultSet($hydrator, new Location());

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

  public function find($locationId)
  {
      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $select = $sql->select();
      $select->columns([
          'id',
          'pokemon',
          'lat',
          'long',
          'created_at'
          ])->from([
        'l' => 'location'
      ])
->where(
        ['l.id' => $locationId]
      );

      $statement = $sql->prepareStatementForSqlObject($select);
      $results = $statement->execute();

      $hydrator = new AggregateHydrator();
      $hydrator->add(new LocationHydrator());

      $resultSet = new HydratingResultSet($hydrator, new Location());
      $resultSet->initialize($results);

      return ($resultSet->count() ? $resultSet->current() : null);
  }

  public function findById($locationId)
  {
    $sql = new \Zend\Db\Sql\Sql($this->adapter);
    $select = $sql->select();
    $select->columns([
          'id',
          'pokemon',
          'lat',
          'long',
          'created_at'
      ])->from([
        'l' => 'location'
      ])
->where(
      [ 'l.id' => $locationId ]
    );

    $statement = $sql->prepareStatementForSqlObject($select);
    $results = $statement->execute();

    $hydrator = new AggregateHydrator();
    $hydrator->add(new LocationHydrator());

    $resultSet = new HydratingResultSet($hydrator, new Location());
    $resultSet->initialize($results);

    return ($resultSet->count() ? $resultSet->current() : null);
  }

  public function update(Location $location)
  {
    $sql = new \Zend\Db\Sql\Sql($this->adapter);
    $update = $sql->update('location')
      ->set([
                  'pokemon'        => $location->getPokemon(),
                  'lat'        => $location->getLat(),
                  'long'        => $location->getLong()
      ])->where([
        'id' => $location->getId()
      ]);

      $statement = $sql->prepareStatementForSqlObject($update);
      $statement->execute();
  }

  public function delete($locationId)
  {
      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $delete = $sql->delete()
        ->from('location')
        ->where([
          'id' => $locationId
        ]);

        $statement = $sql->prepareStatementForSqlObject($delete);
        $statement->execute();
  }
}

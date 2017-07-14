<?php

namespace Pokedex\Repository;

// use Pokedex\Entity\Hydrator\CategoryHydrator;
use Pokedex\Entity\Hydrator\PokemonHydrator;
use Zend\Hydrator\Aggregate\AggregateHydrator;
use Zend\Db\ResultSet\HydratingResultSet;
use Pokedex\Repository\PokemonRepository;
use Zend\Db\Adapter\AdapterAwareTrait;
use Pokedex\Entity\Pokemon;

class PokemonRepositoryImpl implements PokemonRepository
{
  use AdapterAwareTrait;

  public function save(Pokemon $pokemon)
  {
      try {
          $this->adapter
            ->getDriver()
            ->getConnection()
            ->beginTransaction();

      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $insert = $sql->insert()
        ->values([
          'national_id' => $pokemon->getNationalId(),
          'name'  => $pokemon->getName(),
          'description' => $pokemon->getDescription(),
        ])
        ->into('pokemon');
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
          'national_id',
          'name',
          'description'
      ])->from([
        'p' => 'pokemon'
      ]);
      // ->join(
      //     ['c' => 'category'], // table name
      //     'c.id = p.category_id',
      //     ['category_id' => 'id', 'name', 'category_slug' => 'slug'] // column alias
      // );

      $statement = $sql->prepareStatementForSqlObject($select);
      $result = $statement->execute();

      $hydrator = new AggregateHydrator();
      $hydrator->add(new PokemonHydrator());
      // $hydrator->add(new CategoryHydrator());
      $resultSet = new HydratingResultSet($hydrator, new Pokemon());
      $resultSet->initialize($result);

      $pokemons = [];
      foreach($resultSet as $pokemon) {
          /**
           * @var \Pokemon\Entity\Pokemon $pokemon
           */
          $pokemons[] = $pokemon;
      }
      return $pokemons;
  }

  public function fetch($page)
  {
      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $select = $sql->select();
      $select->columns([
          'id',
          'national_id',
          'name',
          'description'
      ])->from([
        'p' => 'pokemon'
      ]);
      /*->join(
          ['c' => 'category'], // table name
          'c.id = p.category_id',
          ['category_id' => 'id', 'name', 'category_slug' => 'slug'] // column alias
      );*/

      $hydrator = new AggregateHydrator();
      $hydrator->add(new PokemonHydrator());
      // $hydrator->add(new CategoryHydrator());
      $resultSet = new HydratingResultSet($hydrator, new Pokemon());

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

  public function find($pokemonName)
  {
      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $select = $sql->select();
      $select->columns([
          'id',
          'national_id',
          'name',
          'description'
      ])->from([
        'p' => 'pokemon'
      ])
// ->join(
//         ['c' => 'category'], // TABLE NAME
//         'c.id = p.category_id', // JOIN CONDITION
//         ['category_id' => 'id', 'name', 'category_slug' => 'slug']
//       )
->where(
//         [ 'c.slug' => $categorySlug, 'p.slug' => $pokemonSlug]
        ['p.name' => $pokemonName]
      );

      $statement = $sql->prepareStatementForSqlObject($select);
      $results = $statement->execute();

      $hydrator = new AggregateHydrator();
      $hydrator->add(new PokemonHydrator());
      // $hydrator->add(new CategoryHydrator());

      $resultSet = new HydratingResultSet($hydrator, new Pokemon());
      $resultSet->initialize($results);

      return ($resultSet->count() ? $resultSet->current() : null);
  }

  public function findById($pokemonId)
  {
    $sql = new \Zend\Db\Sql\Sql($this->adapter);
    $select = $sql->select();
    $select->columns([
          'id',
          'national_id',
          'name',
          'description'
      ])->from([
        'p' => 'pokemon'
      ])
/*->join(
      ['c' => 'category'], // TABLE NAME
      'c.id = p.category_id', // JOIN CONDITION
      ['category_id' => 'id', 'name', 'category_slug' => 'slug']
    )*/
->where(
      [ 'p.id' => $pokemonId ]
    );

    $statement = $sql->prepareStatementForSqlObject($select);
    $results = $statement->execute();

    $hydrator = new AggregateHydrator();
    $hydrator->add(new PokemonHydrator());
    // $hydrator->add(new CategoryHydrator());

    $resultSet = new HydratingResultSet($hydrator, new Pokemon());
    $resultSet->initialize($results);

    return ($resultSet->count() ? $resultSet->current() : null);
  }

  public function update(Pokemon $pokemon)
  {
    $sql = new \Zend\Db\Sql\Sql($this->adapter);
    $update = $sql->update('pokemon')
      ->set([
        'national_id'       => $pokemon->getNationalId(),
        'name'        => $pokemon->getName(),
        'description'     => $pokemon->getDescription()
      ])->where([
        'id' => $pokemon->getId()
      ]);

      $statement = $sql->prepareStatementForSqlObject($update);
      $statement->execute();
  }

  public function delete($pokemonId)
  {
      $sql = new \Zend\Db\Sql\Sql($this->adapter);
      $delete = $sql->delete()
        ->from('pokemon')
        ->where([
          'id' => $pokemonId
        ]);

        $statement = $sql->prepareStatementForSqlObject($delete);
        $statement->execute();
  }
}

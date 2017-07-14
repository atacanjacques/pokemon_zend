<?php

namespace Pokedex\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Pokedex\Entity\Pokemon;
// use Pokedex\Entity\Category;
use Zend\Cache\StorageFactory;

class PokemonController extends AbstractRestfulController
{
  protected $pokemonService;
  protected $cache;

  public function __construct($pokemonService)
  {
    $this->pokemonService = $pokemonService;
    $this->cache = StorageFactory::factory([
      'adapter' => [
        'name'  => 'filesystem',
        'options' => [
          'namespace' => 'api_pokemons'
        ]
      ],
      'plugins' => [
        'exception_handler' => [
          'throw_exceptions'  => false
        ],
        'Serializer'
      ]
    ]);
  }

  public function create($data)
  {
    $pokemon = $this->setPokemoon($data);

    $this->pokemonService->save($pokemon);
    return new JsonModel(['success']);
  }

  public function delete($id)
  {
    try {
      $this->pokemonService->delete($id);
      $message = 'success';
    } catch (\Exception $e) {
      $message = $e->getMessage();
    }

    return new JsonModel([$message]);
  }

  public function get($id)
  {
    $pokemon = $this->pokemonService->findById($id);

    $result = $this->postToPokemon($pokemon);

    return new JsonModel($result);
  }

  public function getList()
  {
    $cacheKey = 'list';
    $pokemons = $this->cache->getItem($cacheKey);

    if (is_array($pokemons) && count($pokemons)) {
      return new JsonModel($pokemons);
    }

    $pokemons = $this->pokemonService->fetchAll();

    $results = [];
    foreach ($pokemons as $pokemon) {
      $results[] = $this->postToPokemon($pokemon);
    }
    $this->cache->setItem($cacheKey, $results);

    return new JsonModel($results);
  }

  public function update($id, $data)
  {
    $pokemon = $this->setPokemoon($data);
    $pokemon->setId($id);

    $this->pokemonService->update($pokemon);
    return new JsonModel(['success']);
  }

  public function patch($id, $data)
  {
    try {
      $pokemon = $this->pokemonService->findById($id);
      if (!$pokemon) {
        throw new \Exception(sprintf("Le Pokemon %s n'éxiste pas !", $id));
      }

      // foreach ($data as $key => $value) {
      //   $setter = 'set' . ucfirst($key);
      //   if ($key == 'category') {
      //     $category = new Category();
      //     $category->setId($value);
      //     $post->setCategory($category);
      //   } elseif (method_exists($post, $setter)) {
      //     $post->$setter($value);
      //   }
      // }
      $this->pokemonService->update($pokemon);
    } catch (\Exception $e) {
      return new JsonModel([$e->getMessage()]);
    }

    return new JsonModel(["success"]);
  }

  protected function postToPokemon($pokemon)
  {
      return [
        'id'              => $pokemon->getId(),
        'national_id'     => $pokemon->getNationalId(),
        'name'            => $pokemon->getname(),
        'description'     => $pokemon->getDescription()
      ];
  }

  protected function setPokemon($data)
  {
    $pokemon = new Pokemon();
    $pokemon->setNationalId($data['national_id']);
    $pokemon->setname($data['name']);
    $pokemon->setDescription($data['description']);
    // $category = new Category();
    // $category->setId($data['category']);
    // $pokemon->setCategory($category);

    return $pokemon;
  }
}

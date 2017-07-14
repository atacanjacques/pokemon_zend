<?php

namespace Pokedex\Repository;

use Application\Repository\RepositoryInterface;
use Pokedex\Entity\Pokemon;

interface PokemonRepository extends RepositoryInterface
{
  public function save(Pokemon $pokemon);

  public function fetchAll();

  public function fetch($page);

  public function find($pokemonName);

  public function findById($pokemonId);

  public function update(Pokemon $pokemon);

  public function delete($pokemonId);
}

<?php

namespace Pokemon\Service;

use Pokemon\Entity\Pokemon;
use Pokemon\Service\PokemonService;

class PokemonServiceImpl implements PokemonService
{
  protected $pokemonRepository;

  public function getPokemonRepository()
  {
      return $this->pokemonRepository;
  }

  public function setPokemonRepository($pokemonRepository)
  {
    $this->pokemonRepository = $pokemonRepository;
  }

  public function save(Pokemon $pokemon)
  {
    $this->pokemonRepository->save($pokemon);
  }

  public function fetchAll()
  {
    return $this->pokemonRepository->fetchAll();
  }

  public function fetch($page)
  {
    return $this->pokemonRepository->fetch($page);
  }

  public function find($pokemonName)
  {
    return $this->pokemonRepository->find($pokemonName);
  }

  public function findById($pokemonId)
  {
    return $this->pokemonRepository->findById($pokemonId);
  }

  public function update(Pokemon $pokemon)
  {
    $this->pokemonRepository->update($pokemon);
  }

  public function delete($pokemonId)
  {
    $this->pokemonRepository->delete($pokemonId);
  }
}

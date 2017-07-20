<?php

namespace Pokemon\Controller;

use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Pokemon\Form\Add;
use Pokemon\Form\Edit;
use Pokemon\InputFilter\AddPokemon;
use Pokemon\Entity\Pokemon;

class PokemonApiController extends AbstractActionController
{
  protected $pokemonService;
  protected $typeService;
  protected $locationService;

  public function __construct($pokemonService, $typeService, $locationService)
  {
    $this->pokemonService = $pokemonService;
    $this->typeService = $typeService;
    $this->locationService = $locationService;
  }

  public function indexAction()
  {
    $types = $this->typeService->fetchAll();
    foreach($types as $type){
      $allTypes[$type->getId()] = $type->getName();
    }

    $pokemons = $this->pokemonService->fetchAll();

    $pokemonsIds = [];
    foreach ($pokemons as $pokemon) {
      array_push($pokemonsIds, $pokemon->getId());
    }

    $pokemonEvolutions = [];
    foreach ($pokemonsIds as $pokemonsId) {
      $pokemonEvolution = [];
      foreach($pokemons as $pokemon){
        if($pokemon->getPreviousPokemon() == $pokemonsId){
          array_push($pokemonEvolution, $pokemon->getName());
        }
      }
      $pokemonEvolutions[$pokemonsId] = $pokemonEvolution;
    }

    $allPokemons = [];
    foreach($pokemons as $pokemon){
      $allPokemons[$pokemon->getId()]['national_id'] = $pokemon->getNationalId();
      $allPokemons[$pokemon->getId()]['name'] = $pokemon->getName();
      $allPokemons[$pokemon->getId()]['description'] = $pokemon->getDescription();
      if($pokemon->getType1() != 0){
        $allPokemons[$pokemon->getId()]['types'][] = $allTypes[$pokemon->getType1()];
      }
      if($pokemon->getType2() != 0){
        $allPokemons[$pokemon->getId()]['types'][] = $allTypes[$pokemon->getType2()];
      }
      if(!empty($pokemonEvolutions[$pokemon->getId()])){
        $allPokemons[$pokemon->getId()]['evolutions'] = $pokemonEvolutions[$pokemon->getId()];
      }
    }

    return new JsonModel($allPokemons);
  }

  public function addAction()
  {
    $national_id = $this->params()->fromQuery("national_id");
    $name = $this->params()->fromQuery("name");
    $description = $this->params()->fromQuery("description");
    $type1 = $this->params()->fromQuery("type1");
    $type2 = $this->params()->fromQuery("type2");
    $previous_pokemon = $this->params()->fromQuery("previous_pokemon");

    if(!is_null($national_id) && !is_null($name) && !is_null($description) && !is_null($type1) && !is_null($type2) && !is_null($previous_pokemon)){


      $types = $this->typeService->fetchAll();

      $pokemons = $this->pokemonService->fetchAll();
      $allPokemonsWithNationalId = [];
      foreach($pokemons as $pokemon){
        $allPokemonsWithNationalId[$pokemon->getNationalId()] = $pokemon->getId();
      }

      $pokemonPost = new Pokemon();
      $pokemonPost->setNationalId($national_id);
      $pokemonPost->setName($name);
      $pokemonPost->setDescription($description);
      $pokemonPost->setType1($type1);
      $pokemonPost->setType2($type2);
      if(!empty($allPokemonsWithNationalId[$previous_pokemon])){
        $pokemonPost->setPreviousPokemon($allPokemonsWithNationalId[$previous_pokemon]);
      }
      else{
        $pokemonPost->setPreviousPokemon(0);
      }

      $this->pokemonService->save($pokemonPost);
      return new JsonModel(['success']);
    }
    else{
      return new JsonModel(['error']);
    }
  }

  public function showAction()
  {
    $name = $this->params()->fromQuery("name");

    if(!is_null($name)){

      $types = $this->typeService->fetchAll();
      foreach($types as $type){
        $allTypes[$type->getId()] = $type->getName();
      }

      $pokemons = $this->pokemonService->fetchAll();
      foreach($pokemons as $pokemon){
        $allPokemons[$pokemon->getId()] = $pokemon->getName();
      }

      $pokemon = $this->pokemonService->find($name);

      $locations = $this->locationService->fetchAllRecentAndPokemonId(
        $pokemon->getId()
        );

      $evolutions = [];
      foreach($pokemons as $pokemonBis){
        if($pokemonBis->getPreviousPokemon() == $pokemon->getId()){
          array_push($evolutions, $pokemonBis->getName());
        }
      }
      $pokemonTypes = [];
      foreach($types as $type){
        if( ($type->getId() == intval($pokemon->getType1())) || ($type->getId() == intval($pokemon->getType2())) ){
          array_push($pokemonTypes, $type->getName());
        }
      }

      $show_pokemon['national_id'] = $pokemon->getNationalId();
      $show_pokemon['name'] = $pokemon->getName();
      $show_pokemon['description'] = $pokemon->getDescription();
      if($pokemon->getType1() != 0){
        $show_pokemon['types'][] = $allTypes[$pokemon->getType1()];
      }
      if($pokemon->getType2() != 0){
        $show_pokemon['types'][] = $allTypes[$pokemon->getType2()];
      }
      if(!empty($evolutions)){
        $show_pokemon['evolutions'] = $evolutions;
      }
      foreach ($locations as $location) {
        $show_pokemon['locations'][] = [
        'lat' => $location->getLat(),
        'long' => $location->getLong(),
        'created_at' => $location->getCreatedAt()
        ];
      }

      return new JsonModel($show_pokemon);
    }
    else{
      return new JsonModel(['error']);
    }

  }

  public function deleteAction()
  {
    $name = $this->params()->fromQuery("name");

    if(!is_null($name)){

      $pokemon = $this->pokemonService->find($name);
      $this->pokemonService->delete($pokemon->getId());
      return new JsonModel(['success']);
    }
    else{
      return new JsonModel(['error']);
    }
  }

  public function editAction()
  {
    $national_id = $this->params()->fromQuery("national_id");
    $name = $this->params()->fromQuery("name");
    $description = $this->params()->fromQuery("description");
    $type1 = $this->params()->fromQuery("type1");
    $type2 = $this->params()->fromQuery("type2");
    $previous_pokemon = $this->params()->fromQuery("previous_pokemon");

    if(!is_null($national_id) && !is_null($name) && !is_null($description) && !is_null($type1) && !is_null($type2) && !is_null($previous_pokemon)){

      $types = $this->typeService->fetchAll();

      $pokemons = $this->pokemonService->fetchAll();
      $allPokemonsWithNationalId = [];
      foreach($pokemons as $pokemon){
        $allPokemonsWithNationalId[$pokemon->getNationalId()] = $pokemon->getId();
      }

      $pokemonPost = new Pokemon();
      $pokemonPost->setId($allPokemonsWithNationalId[$national_id]);
      $pokemonPost->setNationalId($national_id);
      $pokemonPost->setName($name);
      $pokemonPost->setDescription($description);
      $pokemonPost->setType1($type1);
      $pokemonPost->setType2($type2);
      if(!empty($allPokemonsWithNationalId[$previous_pokemon])){
        $pokemonPost->setPreviousPokemon($allPokemonsWithNationalId[$previous_pokemon]);
      }
      else{
        $pokemonPost->setPreviousPokemon(0);
      }

      $this->pokemonService->update($pokemonPost);
      return new JsonModel(['success']);
    }
    else{
      return new JsonModel(['error']);
    }
  }
}

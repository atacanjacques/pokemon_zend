<?php

namespace Pokemon\Controller;

use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Pokemon\Form\Add;
use Pokemon\Form\Edit;
use Pokemon\InputFilter\AddPokemon;
use Pokemon\Entity\Pokemon;

class PokemonController extends AbstractActionController
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
    if(!$this->identity()){
      $this->layout('layout/layout_public');

    }

    $types = $this->typeService->fetchAll();
    $allTypes = [0 => "Aucun"];
    foreach($types as $type){
      $allTypes[$type->getId()] = $type->getName();
    }

    $pokemons = $this->pokemonService->fetch(
      $this->params()->fromRoute('page')
      );


    $pokemonTypes = [];
    foreach($pokemons as $pokemon){
      $pokemonType = [];

      foreach($types as $type){
        if( ($type->getId() == intval($pokemon->getType1())) || ($type->getId() == intval($pokemon->getType2())) ){
          array_push($pokemonType, $type->getName());
        }
      }
      $pokemonTypes[$pokemon->getId()] = $pokemonType;
    }


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

    $variables = [
    'pokemonTypes' => $pokemonTypes,
    'pokemonEvolutions' => $pokemonEvolutions,
    'types' => $types,
    'pokemons' => $pokemons
    ];

    if(!$this->identity()){
      $viewModel = new ViewModel($variables);
      $viewModel->setTemplate('pokemon/index_public');
      return $viewModel;
    }
    else{
      return new ViewModel($variables);
    }
  }

  public function addAction()
  {

    if(!$this->identity()){
      return $this->redirect()->toRoute('pokemon_home');
    }

    $types = $this->typeService->fetchAll();
    $allTypes = [0 => "Aucun"];
    foreach($types as $type){
      $allTypes[$type->getId()] = $type->getName();
    }

    $pokemons = $this->pokemonService->fetchAll();
    $allPokemons = [0 => "Aucun"];
    foreach($pokemons as $pokemon){
      $allPokemons[$pokemon->getId()] = $pokemon->getName();
    }

    $form = new Add($allTypes, $allPokemons);

    $variables = [
    'form' => $form
    ];

    if ($this->request->isPost()) {
      $pokemonPost = new Pokemon();
      $form->bind($pokemonPost);

      $form->setInputFilter(new AddPokemon());

      $data = $this->request->getPost();
      $form->setData($data);

      if ($form->isValid()) {
        $this->pokemonService->save($pokemonPost);

        return $this->redirect()->toRoute('pokemon_home');
      }
    }

    return new ViewModel($variables);
  }

  public function showAction()
  {

    if(!$this->identity()){
      $this->layout('layout/layout_public');

    }

    $types = $this->typeService->fetchAll();
    $allTypes = [0 => "Aucun"];
    foreach($types as $type){
      $allTypes[$type->getId()] = $type->getName();
    }

    $pokemons = $this->pokemonService->fetchAll();
    $allPokemons = [0 => "Aucun"];
    foreach($pokemons as $pokemon){
      $allPokemons[$pokemon->getId()] = $pokemon->getName();
    }

    $pokemon = $this->pokemonService->find(
      $this->params()->fromRoute('pokemonName')
      );

    $locations = $this->locationService->fetchAllRecentAndPokemonId(
      $pokemon->getId()
      );

    if (is_null($pokemon)) {
      $this->getResponse()->setStatusCode(Response::STATUS_CODE_404);
    }

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

    $variables = [
    'pokemonTypes' => $pokemonTypes,
    'types' => $types,
    'evolutions' => $evolutions,
    'pokemon' => $pokemon,
    'pokemons' => $pokemons,
    'locations' => $locations
    ];

    if(!$this->identity()){
      $viewModel = new ViewModel($variables);
      $viewModel->setTemplate('pokemon/show_public');
      return $viewModel;
    }
    else{
      return new ViewModel($variables);
    }
  }

  public function deleteAction()
  {
    if(!$this->identity()){
      return $this->redirect()->toRoute('pokemon_home');
    }

    $this->pokemonService->delete($this->params()->fromRoute('pokemonId'));
    $this->redirect()->toRoute('pokemon_home');
  }

  public function editAction()
  {
    if(!$this->identity()){
      return $this->redirect()->toRoute('pokemon_home');
    }

    $types = $this->typeService->fetchAll();
    $allTypes = [0 => "Aucun"];
    foreach($types as $type){
      $allTypes[$type->getId()] = $type->getName();
    }

    $pokemons = $this->pokemonService->fetchAll();
    $allPokemons = [0 => "Aucun"];
    foreach($pokemons as $pokemon){
      $allPokemons[$pokemon->getId()] = $pokemon->getName();
    }

    $form = new Edit($allTypes, $allPokemons);

    $variables = ['form' => $form];

    if ($this->request->isPost()) {
      $pokemonPost = new Pokemon();
      $form->bind($pokemonPost);
      $form->setInputFilter(new AddPokemon());
      $data = $this->request->getPost();
      $form->setData($data);
      if ($form->isValid()) {
        $this->pokemonService->update($pokemonPost);
        return $this->redirect()->toRoute('pokemon_home');
      }
    }
    else
    {
      $pokemon = $this->pokemonService
      ->findById(
        $this->params()->fromRoute('pokemonId')
        );
      if (is_null($pokemon)) {
        $this->getResponse()->setStatusCode(Response::STATUS_CODE_404);
      } else {
        $form->bind($pokemon);
        $form->get('name')->setValue($pokemon->getName());
        $form->get('id')->setValue($pokemon->getId());
      }
    }
    return new ViewModel($variables);
  }
}

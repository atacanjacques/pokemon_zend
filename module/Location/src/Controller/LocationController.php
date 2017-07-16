<?php

namespace Location\Controller;

use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Location\Form\Add;
use Location\Form\Edit;
use Location\InputFilter\AddLocation;
use Location\Entity\Location;

class LocationController extends AbstractActionController
{
  protected $locationService;
  protected $pokemonService;

  public function __construct($locationService, $pokemonService)
  {
    $this->locationService = $locationService;
    $this->pokemonService = $pokemonService;
  }

  public function indexAction()
  {
    if(!$this->identity()){
      return $this->redirect()->toRoute('pokemon_home');
    }

    $locations = $this->locationService->fetch(
      $this->params()->fromRoute('page')
      );

    $pokemons = $this->pokemonService->fetchAll();
    $allPokemons = [0 => "Aucun"];
    foreach($pokemons as $pokemon){
      $allPokemons[$pokemon->getId()] = $pokemon->getName();
    }

    $variables = [
    'locations' => $locations,
    'pokemons' => $pokemons
    ];

    return new ViewModel($variables);
  }

  public function addAction()
  {
    if(!$this->identity()){
      $this->layout('layout/layout_public');

    }

    $pokemons = $this->pokemonService->fetchAll();
    $allPokemons = [0 => "Aucun"];
    foreach($pokemons as $pokemon){
      $allPokemons[$pokemon->getId()] = $pokemon->getName();
    }

    $form = new Add($allPokemons);

    $variables = [
    'form' => $form,
    'pokemons' => $pokemons
    ];

    if ($this->request->isPost()) {
      $locationPost = new Location();
      $form->bind($locationPost);

      $form->setInputFilter(new AddLocation());

      $data = $this->request->getPost();
      $form->setData($data);

      if ($form->isValid()) {
        $this->locationService->save($locationPost);

        return $this->redirect()->toRoute('location_home');
      }
    }


    if(!$this->identity()){
      $viewModel = new ViewModel($variables);
      $viewModel->setTemplate('location/add_public');
      return $viewModel;
    }
    else{
      return new ViewModel($variables);
    }
  }

  public function showAction()
  {
    if(!$this->identity()){
      return $this->redirect()->toRoute('pokemon_home');
    }

    $location = $this->locationService->find(
      $this->params()->fromRoute('locationId')
      );

    $pokemons = $this->pokemonService->fetchAll();
    $allPokemons = [0 => "Aucun"];
    foreach($pokemons as $pokemon){
      $allPokemons[$pokemon->getId()] = $pokemon->getName();
    }

    if (is_null($location)) {
      $this->getResponse()->setStatusCode(Response::STATUS_CODE_404);
    }

    $variables = [
    'location' => $location,
    'pokemons' => $pokemons
    ];

    return new ViewModel($variables);
  }

  public function deleteAction()
  {
    if(!$this->identity()){
      return $this->redirect()->toRoute('pokemon_home');
    }

    $this->locationService->delete($this->params()->fromRoute('locationId'));
    $this->redirect()->toRoute('location_home');
  }

  public function editAction()
  {
    if(!$this->identity()){
      return $this->redirect()->toRoute('pokemon_home');
    }

    $pokemons = $this->pokemonService->fetchAll();
    $allPokemons = [0 => "Aucun"];
    foreach($pokemons as $pokemon){
      $allPokemons[$pokemon->getId()] = $pokemon->getName();
    }


    $form = new Edit($allPokemons);

    $variables = ['form' => $form];

    if ($this->request->isPost()) {
      $locationPost = new Location();
      $form->bind($locationPost);
      $form->setInputFilter(new AddLocation());
      $data = $this->request->getPost();
      $form->setData($data);
      if ($form->isValid()) {
        $this->locationService->update($locationPost);
        return $this->redirect()->toRoute('location_home');
      }
    }
    else
    {
      $location = $this->locationService
      ->findById(
        $this->params()->fromRoute('locationId')
        );
      if (is_null($location)) {
        $this->getResponse()->setStatusCode(Response::STATUS_CODE_404);
      } else {
        $form->bind($location);
        $form->get('id')->setValue($location->getId());
      }
    }
    return new ViewModel($variables);
  }
}

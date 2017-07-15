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

  public function __construct($pokemonService, $typeService)
  {
    $this->pokemonService = $pokemonService;
    $this->typeService = $typeService;
  }

  public function indexAction()
  {
      $pokemons = $this->pokemonService->fetch(
          $this->params()->fromRoute('page')
      );

      $variables = [
        'pokemons' => $pokemons
      ];

      return new ViewModel($variables);
  }

  public function addAction()
  {

    $types = $this->typeService->fetchAll();
    $allTypes = [];
    foreach($types as $type){
      $allTypes[$type->getId()] = $type->getName();
    }

    $form = new Add($allTypes);

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
    $pokemon = $this->pokemonService->find(
      $this->params()->fromRoute('pokemonName')
    );

    if (is_null($pokemon)) {
      $this->getResponse()->setStatusCode(Response::STATUS_CODE_404);
    }

    return new ViewModel(['pokemon' => $pokemon]);
  }

  public function deleteAction()
  {
    $this->pokemonService->delete($this->params()->fromRoute('pokemonId'));
    $this->redirect()->toRoute('pokemon_home');
  }

  public function editAction()
  {
    $form = new Edit();
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

<?php

namespace Location\Controller;

use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Location\Entity\Location;
use Location\Form\Add;

class ApiController extends AbstractActionController
{
  protected $locationService;
  protected $pokemonService;

  public function __construct($locationService, $pokemonService)
  {
    $this->locationService = $locationService;
    $this->pokemonService = $pokemonService;
  }

  public function addAction()
  {
    $id = $this->params()->fromQuery("id");
    $lat = $this->params()->fromQuery("lat");
    $long = $this->params()->fromQuery("long");

    if(!is_null($id) && !is_null($lat) && !is_null($long)){
      $pokemons = $this->pokemonService->fetchAll();
      $allPokemons = [0 => "Aucun"];
      foreach($pokemons as $pokemon){
        $allPokemons[$pokemon->getNationalId()] = $pokemon->getId();
      }



      $locationPost = new Location();
      $locationPost->setPokemon($allPokemons[$id]);
      $locationPost->setLat($lat);
      $locationPost->setLong($long);

      $this->locationService->save($locationPost);
      return new JsonModel(['success']);
    }
    else{
      return new JsonModel(['error']);
    }

  }
}

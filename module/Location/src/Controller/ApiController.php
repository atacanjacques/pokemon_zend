<?php

namespace Location\Controller;

use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Location\Entity\Location;

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
var_dump($id);
var_dump($lat);
var_dump($long);
    // $form = new Add();


    // if ($this->request->isPost()) {
    //   $locationPost = new Location();
    //   $form->bind($locationPost);

    //   $form->setInputFilter(new AddLocation());

    //   $data = $this->request->getPost();
    //   $form->setData($data);

    //   if ($form->isValid()) {
    //     $this->locationService->save($locationPost);

    //     return $this->redirect()->toRoute('location_home');
    //   }
    // }
    return new JsonModel(['success']);

      }
}

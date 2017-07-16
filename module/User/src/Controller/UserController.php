<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use User\Form\Login;
use User\Entity\User;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
  protected $addUserFilter;
  protected $userService;
  
  public function __construct(\User\Service\UserService $userService, \User\InputFilter\AddUser $addUserFilter)
  {
    $this->addUserFilter = $addUserFilter;
    $this->userService = $userService;
  }

  public function loginAction()
  {
    if ($this->identity() != null) {
      return $this->redirect()->toRoute('pokemon_home');
    }

    $form = new Login();
    if ($this->request->isPost()) {
      $form->setData($this->request->getPost());
      $form->setInputFilter($this->addUserFilter);

      if ($form->isValid()) {
        $data = $form->getData();
        $loginResult = $this->userService
        ->login(
          $data['email'],
          $data['password']
          );

        if($loginResult){
          return $this->redirect()->toRoute('pokemon_home');
        }
      }
    }

    return new ViewModel([
      'form' => $form
      ]);
  }

  public function logoutAction()
  {
    $authenticationService = $this->userService->getAuthenticationService();
    $authenticationService->clearIdentity();

    return $this->redirect()->toRoute('user_login');
  }
}

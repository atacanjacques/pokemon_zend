<?php

namespace User\Service;

use User\Entity\User;
use Zend\Authentication\AuthenticationService;

class UserServiceImpl implements UserService
{
  protected $userRepository;

  public function getUserRepository()
  {
    return $this->userRepository;
  }

  public function setUserRepository($userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function getAuthenticationService()
  {
    $authenticationAdapter = $this->userRepository->getAuthenticationAdapter();

    return new AuthenticationService(null, $authenticationAdapter);
  }

  public function login($email, $password)
  {
    $authenticationService = $this->getAuthenticationService();

    $authenticationAdapter = $authenticationService->getAdapter();
    $authenticationAdapter->setIdentity($email);
    $authenticationAdapter->setCredential($password);
    $result = $authenticationService->authenticate();

    if ($result->isValid()) {
      $identityObject = $authenticationAdapter->getResultRowObject(
        null,
        ['password']
      );
      $authenticationService->getStorage()->write($identityObject);

      return true;
    }

    return false;
  }
}

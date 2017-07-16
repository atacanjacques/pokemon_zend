<?php

namespace User\Controller;

use Interop\Container\ContainerInterface;

class UserControllerFactory
{
  public function __invoke(ContainerInterface $container)
  {
    return new UserController(
      $container->get('User\Service\UserService'),
      $container->get('User\InputFilter\AddUser')
    );
  }
}

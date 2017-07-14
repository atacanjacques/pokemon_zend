<?php

namespace Type\Controller;

use Interop\Container\ContainerInterface;

class TypeControllerFactory
{
  public function __invoke(ContainerInterface $container)
  {
    return new TypeController($container->get('Type\Service\TypeService'));
  }
}

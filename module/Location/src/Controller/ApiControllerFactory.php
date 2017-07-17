<?php

namespace Location\Controller;

use Interop\Container\ContainerInterface;

class ApiControllerFactory
{
  public function __invoke(ContainerInterface $container)
  {
    return new ApiController($container->get('Location\Service\LocationService'), $container->get('Pokemon\Service\PokemonService'));
  }
}

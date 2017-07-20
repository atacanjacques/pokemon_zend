<?php

namespace Pokemon\Controller;

use Interop\Container\ContainerInterface;

class PokemonApiControllerFactory
{
  public function __invoke(ContainerInterface $container)
  {
    return new PokemonApiController($container->get('Pokemon\Service\PokemonService'), $container->get('Type\Service\TypeService'), $container->get('Location\Service\LocationService'));
  }
}

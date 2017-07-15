<?php

namespace Pokemon\Controller;

use Interop\Container\ContainerInterface;

class PokemonControllerFactory
{
  public function __invoke(ContainerInterface $container)
  {
    return new PokemonController($container->get('Pokemon\Service\PokemonService'), $container->get('Type\Service\TypeService'));
  }
}

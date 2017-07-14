<?php

namespace Pokedex\Controller;

use Interop\Container\ContainerInterface;

class PokemonControllerFactory
{
  public function __invoke(ContainerInterface $container)
  {
    return new PokemonController($container->get('Pokedex\Service\PokemonService'));
  }
}

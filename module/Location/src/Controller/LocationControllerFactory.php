<?php

namespace Location\Controller;

use Interop\Container\ContainerInterface;

class LocationControllerFactory
{
  public function __invoke(ContainerInterface $container)
  {
    return new LocationController($container->get('Location\Service\LocationService'), $container->get('Pokemon\Service\PokemonService'));
  }
}

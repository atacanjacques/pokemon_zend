<?php

namespace Pokedex;
return [
  'invokables' => [
    'Pokedex\Repository\PokemonRepository' => 'Pokedex\Repository\PokemonRepositoryImpl'
  ],
  'factories' => [
    'Pokedex\Service\PokemonService' => function(\Zend\ServiceManager\ServiceManager $sl) {
        $pokemonService = new \Pokedex\Service\PokemonServiceImpl();
        $pokemonService->setPokemonRepository($sl->get('Pokedex\Repository\PokemonRepository'));
        return $pokemonService;
    }
  ],
  // initializers are called on every instantiation
  'initializers' => [
    function (\Zend\ServiceManager\ServiceManager $sl, $instance) {
        if ($instance instanceof \Zend\Db\Adapter\AdapterAwareInterface) {
          $instance->setDbAdapter($sl->get('Zend\Db\Adapter\Adapter'));
        }
    }
  ]
];

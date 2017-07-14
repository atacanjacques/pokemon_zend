<?php

namespace Pokemon;
return [
  'invokables' => [
    'Pokemon\Repository\PokemonRepository' => 'Pokemon\Repository\PokemonRepositoryImpl'
  ],
  'factories' => [
    'Pokemon\Service\PokemonService' => function(\Zend\ServiceManager\ServiceManager $sl) {
        $pokemonService = new \Pokemon\Service\PokemonServiceImpl();
        $pokemonService->setPokemonRepository($sl->get('Pokemon\Repository\PokemonRepository'));
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

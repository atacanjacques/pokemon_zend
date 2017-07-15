<?php

namespace Location;
return [
  'invokables' => [
    'Location\Repository\LocationRepository' => 'Location\Repository\LocationRepositoryImpl'
  ],
  'factories' => [
    'Location\Service\LocationService' => function(\Zend\ServiceManager\ServiceManager $sl) {
        $locationService = new \Location\Service\LocationServiceImpl();
        $locationService->setLocationRepository($sl->get('Location\Repository\LocationRepository'));
        return $locationService;
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

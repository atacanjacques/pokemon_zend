<?php

namespace Type;
return [
  'invokables' => [
    'Type\Repository\TypeRepository' => 'Type\Repository\TypeRepositoryImpl'
  ],
  'factories' => [
    'Type\Service\TypeService' => function(\Zend\ServiceManager\ServiceManager $sl) {
        $typeService = new \Type\Service\TypeServiceImpl();
        $typeService->setTypeRepository($sl->get('Type\Repository\TypeRepository'));
        return $typeService;
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

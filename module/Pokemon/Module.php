<?php

namespace Pokemon;

class Module
{
    const VERSION = '1.0.0';

    public function getAutoloaderConfig()
    {
      return [
        'Zend\Loader\StandardAutoloader' => [
          'namespaces' => [
            __NAMESPACE__ => __DIR__ . '/src'
          ]
        ]
      ];
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
      return include __DIR__ . '/config/service.config.php';
    }
}

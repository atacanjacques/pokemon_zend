<?php

namespace User;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
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

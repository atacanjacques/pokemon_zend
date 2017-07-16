<?php

namespace User;

return [
  'router' => [
    'routes' => [
      'user_login' => [
          'type' => 'Literal',
          'options' => [
            'route' => '/user/login',
            'defaults'=> [
              'controller' => 'User\Controller\User',
              'action'     => 'login'
            ]
          ]
      ],
      'user_logout' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/user/logout',
          'defaults'=> [
            'controller' => 'User\Controller\User',
            'action'     => 'logout'
          ]
        ]
      ]
    ]
  ],
  'controllers' => [
    'factories' => [
      'User\Controller\User' => 'User\Controller\UserControllerFactory'
    ]
  ],
  'view_manager' => [
    'template_path_stack' => [
      __DIR__ . '/../view'
    ]
  ]
];

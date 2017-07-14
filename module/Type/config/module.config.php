<?php

namespace Type;

return [
  // routes

  // type
  'router' => [
    'routes' => [
      'type_home' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/pokedex/type',
          'defaults' => [
            'controller'  => 'Type\Controller\Type',
            'action'      => 'index'
          ],
        ],
        'may_terminate' => true,
        'child_routes' => [
            'paged' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/page/:page' ,
                    'constraints' => [ 'page' => '[0-9]+' ],
                    'defaults' => [
                        'controller' => 'Type\Controller\Type',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
      ],
      'type_add' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/pokedex/type/add',
          'defaults' => [
            'controller'  => 'Type\Controller\Type',
            'action'      => 'add'
          ]
        ],
        'priority' => 1
      ],
      'type_edit' => [
        'type' => 'Segment',
        'options' => [
          'route' => '/pokedex/type/edit/:typeId',
          'constraints' => [
            'typeId' => '[0-9]+'
          ],
          'defaults' => [
            'controller'  => 'Type\Controller\Type',
            'action'      => 'edit'
          ]
        ]
      ],
      'type_delete' => [
        'type' => 'Segment',
        'options' => [
          'route' => '/pokedex/type/delete/:typeId',
          'constraints' => [
            'typeId' => '[0-9]+'
          ],
          'defaults' => [
            'controller'  => 'Type\Controller\Type',
            'action'      => 'delete'
          ]
        ]
      ],
      'type_show' => [
        'type' => 'Segment',
        'options' => [
          'route' => '/pokedex/type/:typeName',
          'contraints' => [
            'typeName'      => '[a-zA-Z0-9-]+',
          ],
          'defaults' => [
            'controller'  => 'Type\Controller\Type',
            'action'      => 'show'
          ]
        ]
      ],
    ]
  ],

  // controllers
  'controllers' => [
    'factories' => [
      'Type\Controller\Type' => 'Type\Controller\TypeControllerFactory',
    ]
  ],

  // view manager
  'view_manager' => [
    'template_path_stack'   => [
      __DIR__ . '/../view'
    ]
  ]
];

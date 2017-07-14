<?php

namespace Pokemon;

return [
  // routes
  'router' => [
    'routes' => [
      'pokemon_home' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/pokemon',
          'defaults' => [
            'controller'  => 'Pokemon\Controller\Index',
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
                        'controller' => 'Pokemon\Controller\Index',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
      ],
      'pokemon_add' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/pokemon/add',
          'defaults' => [
            'controller'  => 'Pokemon\Controller\Index',
            'action'      => 'add'
          ]
        ]
      ],
      'pokemon_edit' => [
        'type' => 'Segment',
        'options' => [
          'route' => '/pokemon/edit/:pokemonId',
          'constraints' => [
            'pokemonId' => '[0-9]+'
          ],
          'defaults' => [
            'controller'  => 'Pokemon\Controller\Index',
            'action'      => 'edit'
          ]
        ]
      ],
      'pokemon_delete' => [
        'type' => 'Segment',
        'options' => [
          'route' => '/pokemon/delete/:pokemonId',
          'constraints' => [
            'pokemonId' => '[0-9]+'
          ],
          'defaults' => [
            'controller'  => 'Pokemon\Controller\Index',
            'action'      => 'delete'
          ]
        ]
      ],
      'pokemon_show' => [
        'type' => 'Segment',
        'options' => [
          'route' => '/pokemon/:pokemonName',
          'contraints' => [
            'pokemonName'      => '[a-zA-Z0-9-]+',
          ],
          'defaults' => [
            'controller'  => 'Pokemon\Controller\Index',
            'action'      => 'show'
          ]
        ]
      ],
      'api_pokemon' => [
        'type'  => 'Segment',
        'options' => [
          'route' => '/api/pokemon/[/:id]',
          'defaults' => [
            'controller'  => 'Pokemon\Controller\Pokemon'
          ]
        ]
      ],
    ]
  ],

  // controllers
  'controllers' => [
    'factories' => [
      'Pokemon\Controller\Index' => 'Pokemon\Controller\IndexControllerFactory',
      'Pokemon\Controller\Pokemon' => 'Pokemon\Controller\PokemonControllerFactory',
    ]
  ],

  // view manager
  'view_manager' => [
    'template_path_stack'   => [
      __DIR__ . '/../view'
    ]
  ]
];

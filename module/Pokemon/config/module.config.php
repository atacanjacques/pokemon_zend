<?php

namespace Pokemon;

return [
  // routes

  // pokemon
  'router' => [
    'routes' => [
      'pokemon_home' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/pokedex/pokemon',
          'defaults' => [
            'controller'  => 'Pokemon\Controller\Pokemon',
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
                        'controller' => 'Pokemon\Controller\Pokemon',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
      ],
      'pokemon_add' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/pokedex/pokemon/add',
          'defaults' => [
            'controller'  => 'Pokemon\Controller\Pokemon',
            'action'      => 'add'
          ]
        ],
        'priority' => 1
      ],
      'pokemon_edit' => [
        'type' => 'Segment',
        'options' => [
          'route' => '/pokedex/pokemon/edit/:pokemonId',
          'constraints' => [
            'pokemonId' => '[0-9]+'
          ],
          'defaults' => [
            'controller'  => 'Pokemon\Controller\Pokemon',
            'action'      => 'edit'
          ]
        ]
      ],
      'pokemon_delete' => [
        'type' => 'Segment',
        'options' => [
          'route' => '/pokedex/pokemon/delete/:pokemonId',
          'constraints' => [
            'pokemonId' => '[0-9]+'
          ],
          'defaults' => [
            'controller'  => 'Pokemon\Controller\Pokemon',
            'action'      => 'delete'
          ]
        ]
      ],
      'pokemon_show' => [
        'type' => 'Segment',
        'options' => [
          'route' => '/pokedex/pokemon/:pokemonName',
          'contraints' => [
            'pokemonName'      => '[a-zA-Z0-9-]+',
          ],
          'defaults' => [
            'controller'  => 'Pokemon\Controller\Pokemon',
            'action'      => 'show'
          ]
        ]
      ],
    ]
  ],

  // controllers
  'controllers' => [
    'factories' => [
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

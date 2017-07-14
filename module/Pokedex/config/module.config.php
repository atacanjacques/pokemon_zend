<?php

namespace Pokedex;

return [
  // routes
  'router' => [
    'routes' => [
      'pokedex_home' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/pokedex',
          'defaults' => [
            'controller'  => 'Pokedex\Controller\Index',
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
                        'controller' => 'Pokedex\Controller\Index',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
      ],

      // pokemon
      'pokemon_add' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/pokedex/pokemon/add',
          'defaults' => [
            'controller'  => 'Pokedex\Controller\Index',
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
            'controller'  => 'Pokedex\Controller\Index',
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
            'controller'  => 'Pokedex\Controller\Index',
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
            'controller'  => 'Pokedex\Controller\Index',
            'action'      => 'show'
          ]
        ]
      ],

      // api
      'api_pokemon' => [
        'type'  => 'Segment',
        'options' => [
          'route' => '/api/pokedex/pokemon/:id',
          'defaults' => [
            'controller'  => 'Pokedex\Controller\Pokemon'
          ]
        ]
      ],
    ]
  ],

  // controllers
  'controllers' => [
    'factories' => [
      'Pokedex\Controller\Index' => 'Pokedex\Controller\IndexControllerFactory',
      'Pokedex\Controller\Pokemon' => 'Pokedex\Controller\PokemonControllerFactory',
    ]
  ],

  // view manager
  'view_manager' => [
    'template_path_stack'   => [
      __DIR__ . '/../view'
    ]
  ]
];

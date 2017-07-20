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
          'route' => '/',
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
                    'route' => 'pokedex/pokemon/page/:page' ,
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

      // Api
      'api_pokemon_home' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/api/pokemons',
          'defaults' => [
            'controller'  => 'Pokemon\Controller\PokemonApi',
            'action'      => 'index'
          ],
        ],
      ],
      'api_pokemon_add' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/api/pokemon/add',
          'defaults' => [
            'controller'  => 'Pokemon\Controller\PokemonApi',
            'action'      => 'add'
          ]
        ],
        'priority' => 1
      ],
      'api_pokemon_edit' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/api/pokemon/edit',
          'defaults' => [
            'controller'  => 'Pokemon\Controller\PokemonApi',
            'action'      => 'edit'
          ]
        ],
      ],

      'api_pokemon_delete' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/api/pokemon/delete',
          'defaults' => [
            'controller'  => 'Pokemon\Controller\PokemonApi',
            'action'      => 'delete'
          ]
        ],
      ],
      'api_pokemon_show' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/api/pokemon/show',
          'defaults' => [
            'controller'  => 'Pokemon\Controller\PokemonApi',
            'action'      => 'show'
          ]
        ],
      ],
    ]
  ],

  // controllers
  'controllers' => [
    'factories' => [
      'Pokemon\Controller\Pokemon' => 'Pokemon\Controller\PokemonControllerFactory',
      'Pokemon\Controller\PokemonApi' => 'Pokemon\Controller\PokemonApiControllerFactory',
    ]
  ],

  // view manager
  'view_manager' => [
          'template_map' => [
            'pokemon/index_public'           => __DIR__ . '/../view/pokemon/pokemon/index_public.phtml'
        ],
    'template_path_stack'   => [
      __DIR__ . '/../view'
    ]
  ]
];

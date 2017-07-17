<?php

namespace Location;

return [
  // routes

  // location
  'router' => [
    'routes' => [
      'location_home' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/pokedex/location',
          'defaults' => [
            'controller'  => 'Location\Controller\Location',
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
                        'controller' => 'Location\Controller\Location',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
      ],
      'location_add' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/pokedex/location/add',
          'defaults' => [
            'controller'  => 'Location\Controller\Location',
            'action'      => 'add'
          ]
        ],
        'priority' => 1
      ],
      'location_edit' => [
        'type' => 'Segment',
        'options' => [
          'route' => '/pokedex/location/edit/:locationId',
          'constraints' => [
            'locationId' => '[0-9]+'
          ],
          'defaults' => [
            'controller'  => 'Location\Controller\Location',
            'action'      => 'edit'
          ]
        ]
      ],
      'location_delete' => [
        'type' => 'Segment',
        'options' => [
          'route' => '/pokedex/location/delete/:locationId',
          'constraints' => [
            'locationId' => '[0-9]+'
          ],
          'defaults' => [
            'controller'  => 'Location\Controller\Location',
            'action'      => 'delete'
          ]
        ]
      ],
      'location_show' => [
        'type' => 'Segment',
        'options' => [
          'route' => '/pokedex/location/:locationId',
          'contraints' => [
            'locationId'      => '[a-zA-Z0-9-]+',
          ],
          'defaults' => [
            'controller'  => 'Location\Controller\Location',
            'action'      => 'show'
          ]
        ]
      ],

      // api location
      'api_location_add' => [
        'type' => 'Literal',
        'options' => [
          'route' => '/api/location/add',
          'defaults' => [
            'controller'  => 'Location\Controller\Api',
            'action'      => 'add'
          ]
        ]
      ],
    ]
  ],

  // controllers
  'controllers' => [
    'factories' => [
      'Location\Controller\Location' => 'Location\Controller\LocationControllerFactory',
      'Location\Controller\Api' => 'Location\Controller\ApiControllerFactory',
    ]
  ],

  // view manager
  'view_manager' => [
    'template_path_stack'   => [
      __DIR__ . '/../view'
    ]
  ]
];

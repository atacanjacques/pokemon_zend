<?php

namespace Location\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Location\Entity\Hydrator\LocationHydrator;
use Zend\Hydrator\Aggregate\AggregateHydrator;

class Edit extends Form
{
  public function __construct($allPokemons)
  {
    parent::__construct('edit');

    $hydrator = new AggregateHydrator();
    $hydrator->add(new LocationHydrator());

    $this->setHydrator($hydrator);

    $id = new Element\Hidden('id');

    $pokemon = new Element\Select('pokemon');
    $pokemon->setLabel('Pokemon');
    $pokemon->setAttribute('class', 'form-control');
    $pokemon->setValueOptions($allPokemons);

    $lat = new Element\Text('lat');
    $lat->setLabel('Latitude');
    $lat->setAttribute('class', 'form-control');

    $long = new Element\Text('long');
    $long->setLabel('Longitude');
    $long->setAttribute('class', 'form-control');

    $submit = new Element\Submit('submit');
    $submit->setValue('Modifier la Location !');
    $submit->setAttribute('class', 'btn btn-primary');

    $this->add($id);
    $this->add($pokemon);
    $this->add($lat);
    $this->add($long);
    $this->add($submit);

  }

}

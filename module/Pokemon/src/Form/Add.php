<?php

namespace Pokemon\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Pokemon\Entity\Hydrator\PostHydrator;
// use Pokemon\Entity\Hydrator\CategoryHydrator;
use Zend\Hydrator\Aggregate\AggregateHydrator;

class Add extends Form
{
  public function __construct()
  {
    parent::__construct('add');

    $hydrator = new AggregateHydrator();
    $hydrator->add(new PokemonHydrator());
    // $hydrator->add(new CategoryHydrator());

    $this->setHydrator($hydrator);

    $national_id = new Element\Number('national_id');
    $national_id->setLabel('Id National');
    $national_id->setAttribute('class', 'form-control');

    $name = new Element\Text('name');
    $name->setLabel('Nom');
    $name->setAttribute('class', 'form-control');

    $description = new Element\Textarea('description');
    $description->setLabel('Description');
    $description->setAttribute('class', 'form-control');

    $submit = new Element\Submit('submit');
    $submit->setValue('Ajouter le Pokémon !');
    $submit->setAttribute('class', 'btn btn-primary');

    $this->add($national_id);
    $this->add($name);
    $this->add($description);
    $this->add($submit);
  }
}

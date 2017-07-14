<?php

namespace Pokemon\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Pokemon\Entity\Hydrator\PokemonHydrator;
use Zend\Hydrator\Aggregate\AggregateHydrator;

class Edit extends Form
{
  public function __construct()
  {
    parent::__construct('edit');

    $hydrator = new AggregateHydrator();
    $hydrator->add(new PokemonHydrator());

    $this->setHydrator($hydrator);

    $id = new Element\Hidden('id');

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
    $submit->setValue('Modifier le Pokémon !');
    $submit->setAttribute('class', 'btn btn-primary');

    $this->add($id);
    $this->add($national_id);
    $this->add($name);
    $this->add($description);
    $this->add($submit);
  }
}

<?php

namespace Type\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Type\Entity\Hydrator\TypeHydrator;
use Zend\Hydrator\Aggregate\AggregateHydrator;

class Edit extends Form
{
  public function __construct()
  {
    parent::__construct('edit');

    $hydrator = new AggregateHydrator();
    $hydrator->add(new TypeHydrator());

    $this->setHydrator($hydrator);

    $id = new Element\Hidden('id');

    $name = new Element\Text('name');
    $name->setLabel('Nom');
    $name->setAttribute('class', 'form-control');

    $color = new Element\Color('color');
    $color->setLabel('Couleur');
    $color->setAttribute('class', 'form-control');

    $submit = new Element\Submit('submit');
    $submit->setValue('Modifier le Type !');
    $submit->setAttribute('class', 'btn btn-primary');

    $this->add($id);
    $this->add($name);
    $this->add($color);
    $this->add($submit);
  }
}

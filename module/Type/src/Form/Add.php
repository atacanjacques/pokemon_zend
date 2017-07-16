<?php

namespace Type\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Type\Entity\Hydrator\TypeHydrator;
use Zend\Hydrator\Aggregate\AggregateHydrator;

class Add extends Form
{
  public function __construct()
  {
    parent::__construct('add');

    $hydrator = new AggregateHydrator();
    $hydrator->add(new TypeHydrator());

    $this->setHydrator($hydrator);

    $name = new Element\Text('name');
    $name->setLabel('Nom');
    $name->setAttribute('class', 'form-control');

    $color1 = new Element\Text('color1');
    $color1->setLabel('Couleur 1');
    $color1->setAttribute('class', 'form-control');

    $color2 = new Element\Text('color2');
    $color2->setLabel('Couleur 2');
    $color2->setAttribute('class', 'form-control');

    $submit = new Element\Submit('submit');
    $submit->setValue('Ajouter le Type !');
    $submit->setAttribute('class', 'btn btn-primary');

    $this->add($name);
    $this->add($name);
    $this->add($color1);
    $this->add($color2);
    $this->add($submit);
  }
}

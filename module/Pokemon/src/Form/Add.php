<?php

namespace Pokemon\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Pokemon\Entity\Hydrator\PokemonHydrator;
use Zend\Hydrator\Aggregate\AggregateHydrator;
use Type\Entity\Type;

class Add extends Form
{

  public function __construct($allTypes, $allPokemons)
  {
    $this->allTypes = $allTypes;
    $this->allPokemons = $allPokemons;

    parent::__construct('add');

    $hydrator = new AggregateHydrator();
    $hydrator->add(new PokemonHydrator());

    $this->setHydrator($hydrator);

    $national_id = new Element\Number('national_id');
    $national_id->setLabel('ID National');
    $national_id->setAttribute('class', 'form-control');

    $name = new Element\Text('name');
    $name->setLabel('Nom');
    $name->setAttribute('class', 'form-control');

    $description = new Element\Textarea('description');
    $description->setLabel('Description');
    $description->setAttribute('class', 'form-control');

    $type1 = new Element\Select('type1');
    $type1->setLabel('Type 1');
    $type1->setAttribute('class', 'form-control');
    $type1->setValueOptions($allTypes);

    $type2 = new Element\Select('type2');
    $type2->setLabel('Type 2');
    $type2->setAttribute('class', 'form-control');
    $type2->setValueOptions($allTypes);

    $previous_pokemon = new Element\Select('previous_pokemon');
    $previous_pokemon->setLabel('Évolution précedente');
    $previous_pokemon->setAttribute('class', 'form-control');
    $previous_pokemon->setValueOptions($allPokemons);

    $submit = new Element\Submit('submit');
    $submit->setValue('Ajouter le Pokémon');
    $submit->setAttribute('class', 'btn btn-success');

    $this->add($national_id);
    $this->add($name);
    $this->add($description);
    $this->add($type1);
    $this->add($type2);
    $this->add($previous_pokemon);
    $this->add($submit);
  }
}

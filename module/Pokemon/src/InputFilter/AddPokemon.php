<?php
namespace Pokemon\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Filter\FilterChain;
use Zend\Filter\StringTrim;
use Zend\Validator\StringLength;
use Zend\Validator\ValidatorChain;
use Zend\Validator\Digits;
use Zend\Validator\GreaterThan;
use Zend\Validator\LessThan;

class AddPokemon extends InputFilter
{
  public function __construct()
  {
      $national_id = new Input('national_id');
      $national_id->setRequired(true);
      $national_id->setFilterChain($this->getStringTrimFilterChain());
      $national_id->setValidatorChain($this->getNationalIdValidatorChain());

      $name = new Input('name');
      $name->setRequired(true);
      $name->setFilterChain($this->getStringTrimFilterChain());
      $name->setValidatorChain($this->getNameValidatorChain());

      $description = new Input('description');
      $description->setRequired(true);
      $description->setFilterChain($this->getStringTrimFilterChain());
      $description->setValidatorChain($this->getDescriptionValidatorChain());

      $type1 = new Input('type1');
      $type1->setRequired(true);
      $type1->setFilterChain($this->getStringTrimFilterChain());
      $type1->setValidatorChain($this->getType1ValidatorChain());

      $type2 = new Input('type2');
      $type2->setRequired(true);
      $type2->setFilterChain($this->getStringTrimFilterChain());
      $type2->setValidatorChain($this->getType2ValidatorChain());

      $previous_pokemon = new Input('previous_pokemon');
      $previous_pokemon->setRequired(true);
      $previous_pokemon->setFilterChain($this->getStringTrimFilterChain());
      $previous_pokemon->setValidatorChain($this->gePreviousPokemonValidatorChain());

      $this->add($national_id);
      $this->add($name);
      $this->add($description);
  }

  protected function getNationalIdValidatorChain()
  {
      $validatorChain = new ValidatorChain();
      $validatorChain->attach(new Digits(true));
      $validatorChain->attach(new GreaterThan(['min' => 0, 'inclusive' => true]));
      $validatorChain->attach(new LessThan(['max' => 999, 'inclusive' => true]));
      return $validatorChain;
  }

  protected function getNameValidatorChain()
  {
    $stringLength = new StringLength();
    $stringLength->setMin(5);
    $stringLength->setMax(50);

    $validatorChain = new ValidatorChain();
    $validatorChain->attach($stringLength);

    return $validatorChain;
  }

  protected function getDescriptionValidatorChain()
  {
    $stringLength = new StringLength();
    $stringLength->setMin(15);

    $validatorChain = new ValidatorChain();
    $validatorChain->attach($stringLength);

    return $validatorChain;
  }

  protected function getType1ValidatorChain()
  {
      $validatorChain = new ValidatorChain();
      $validatorChain->attach(new Digits(true));
      $validatorChain->attach(new GreaterThan(['min' => 0, 'inclusive' => true]));
      $validatorChain->attach(new LessThan(['max' => 999, 'inclusive' => true]));
      return $validatorChain;
  }

  protected function getType2ValidatorChain()
  {
      $validatorChain = new ValidatorChain();
      $validatorChain->attach(new Digits(true));
      $validatorChain->attach(new GreaterThan(['min' => 0, 'inclusive' => true]));
      $validatorChain->attach(new LessThan(['max' => 999, 'inclusive' => true]));
      return $validatorChain;
  }

  protected function gePreviousPokemonValidatorChain()
  {
      $validatorChain = new ValidatorChain();
      $validatorChain->attach(new Digits(true));
      $validatorChain->attach(new GreaterThan(['min' => 0, 'inclusive' => true]));
      $validatorChain->attach(new LessThan(['max' => 999, 'inclusive' => true]));
      return $validatorChain;
  }

  protected function getStringTrimFilterChain()
  {
      $filterChain = new FilterChain();
      $filterChain->attach(new StringTrim());

      return $filterChain;
  }
}

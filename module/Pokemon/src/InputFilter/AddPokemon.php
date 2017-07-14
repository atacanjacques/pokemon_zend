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

      $this->add($national_id);
      $this->add($name);
      $this->add($description);
  }

  protected function getNationalIdValidatorChain()
  {
      $validatorChain = new ValidatorChain();
      $validatorChain->attach(new Digits(true));
      $validatorChain->attach(new GreaterThan(['min' => 0, 'inclusive' => true]));
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

  protected function getStringTrimFilterChain()
  {
      $filterChain = new FilterChain();
      $filterChain->attach(new StringTrim());

      return $filterChain;
  }
}

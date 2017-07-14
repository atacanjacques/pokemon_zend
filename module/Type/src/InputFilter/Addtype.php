<?php
namespace Type\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Filter\FilterChain;
use Zend\Filter\StringTrim;
use Zend\Validator\StringLength;
use Zend\Validator\ValidatorChain;
use Zend\Validator\Digits;
use Zend\Validator\GreaterThan;

class AddType extends InputFilter
{
  public function __construct()
  {
      $name = new Input('name');
      $name->setRequired(true);
      $name->setFilterChain($this->getStringTrimFilterChain());
      $name->setValidatorChain($this->getNameValidatorChain());

      $this->add($name);
  }

  protected function getNameValidatorChain()
  {
    $stringLength = new StringLength();
    $stringLength->setMin(3);
    $stringLength->setMax(20);

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

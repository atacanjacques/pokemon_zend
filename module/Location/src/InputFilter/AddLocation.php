<?php
namespace Location\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Filter\FilterChain;
use Zend\Filter\StringTrim;
use Zend\Validator\StringLength;
use Zend\Validator\ValidatorChain;
use Zend\Validator\Digits;
use Zend\Validator\GreaterThan;

class AddLocation extends InputFilter
{
  public function __construct()
  {
      $lat = new Input('lat');
      $lat->setRequired(true);
      $lat->setFilterChain($this->getStringTrimFilterChain());
      $lat->setValidatorChain($this->getLatValidatorChain());

      $long = new Input('long');
      $long->setRequired(true);
      $long->setFilterChain($this->getStringTrimFilterChain());
      $long->setValidatorChain($this->getLongValidatorChain());

      $this->add($lat);
      $this->add($long);
  }

  protected function getLatValidatorChain()
  {
    $stringLength = new StringLength();
    $stringLength->setMin(3);
    $stringLength->setMax(50);

    $validatorChain = new ValidatorChain();
    $validatorChain->attach($stringLength);

    return $validatorChain;
  }

  protected function getLongValidatorChain()
  {
    $stringLength = new StringLength();
    $stringLength->setMin(3);
    $stringLength->setMax(50);

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

<?php

namespace User\InputFilter;

use Zend\Filter\FilterChain;
use Zend\Filter\StringTrim;
use Zend\Form\Element\Email;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\StringLength;
use Zend\Validator\ValidatorChain;
use Zend\Validator\Db\NoRecordExists;
use Zend\Validator\EmailAddress;
use Zend\Validator\Regex;
use Zend\Validator\Identical;

class AddUser extends InputFilter
{
  protected $dbAdapter;

  public function __construct(\Zend\Db\Adapter\Adapter $dbAdapter)
  {
    $this->dbAdapter = $dbAdapter;

    $email = new Input('email');
    $email->setRequired(true);
    $email->setValidatorChain($this->getEmailValidatorChain());
    $email->setFilterChain($this->getStringTrimFilterChain());

    $password = new Input('password');
    $password->setRequired(true);
    $password->setValidatorChain($this->getPasswordValidatorChain());
    $password->setFilterChain($this->getStringTrimFilterChain());

    $this->add($email);
    $this->add($password);
  }

  protected function getPasswordValidatorChain()
  {
    $stringLength = new StringLength();
    $stringLength->setMin(3);

    $validatorChain = new validatorChain();
    $validatorChain->attach($stringLength);

    return $validatorChain;
  }

  protected function getEmailValidatorChain()
  {
    $stringLength = new StringLength();
    $stringLength->setMin(7);

    $validatorChain = new ValidatorChain();
    $validatorChain->attach($stringLength);
    $validatorChain->attach(new EmailAddress(), true);

    return $validatorChain;
  }

  protected function getStringTrimFilterChain()
  {
    $filterChain = new FilterChain();
    $filterChain->attach(new StringTrim());

    return $filterChain;
  }
}

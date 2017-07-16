<?php

namespace User\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class Login extends Form
{
  public function __construct()
  {
    parent::__construct('login');

    $email = new Element\Text('email');
    $email->setLabel('Email');
    $email->setAttribute('class', 'form-control');

    $password = new Element\Password('password');
    $password->setLabel('Mot de passe');
    $password->setAttribute('class', 'form-control');

    $submit = new Element\Submit('submit');
    $submit->setValue('Connexion');
    $submit->setAttribute('class', 'btn btn-primary');

    $this->add($email);
    $this->add($password);
    $this->add($submit);
  }
}

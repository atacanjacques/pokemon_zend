<?php

namespace User\Repository;

use User\Entity\User;
use Zend\Crypt\Password\Bcrypt;
use Zend\Db\Adapter\AdapterAwareTrait;
use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;

class UserRepositoryImpl implements UserRepository
{
  use AdapterAwareTrait;

  public function generatePassword($clearPassword)
  {
    $encrypter = new Bcrypt();
    $encrypter->setCost(12);
    return $encrypter->create($clearPassword);
  }


  public function getAuthenticationAdapter()
  {
    $callback = function($encryptedPassword, $clearTextPassword) {
        $encrypter = new Bcrypt();
        $encrypter->setCost(12);
        return $encrypter->verify($clearTextPassword, $encryptedPassword);
    };

    $authenticationAdapter = new CallbackCheckAdapter(
      $this->adapter,
      'user',
      'email',
      'password',
      $callback
    );

    return $authenticationAdapter;
  }
}

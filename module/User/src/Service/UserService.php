<?php

namespace User\Service;

use User\Entity\User;

interface UserService
{

  public function getAuthenticationService();

  public function login($email, $password);
}

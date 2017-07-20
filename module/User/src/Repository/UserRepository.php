<?php

namespace User\Repository;

use Application\Repository\RepositoryInterface;
use User\Entity\User;

interface UserRepository extends RepositoryInterface
{
    public function generatePassword($clearPassword);

    public function getAuthenticationAdapter();
}

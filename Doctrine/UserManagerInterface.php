<?php

namespace AppVerk\Components\Doctrine;

use Gedmo\Timestampable\Timestampable;
use Symfony\Component\Security\Core\User\UserInterface;

interface UserManagerInterface extends Timestampable, ManagerInterface
{
    public function findByEmail(string $email);

    public function updateUser(UserInterface $user);
}

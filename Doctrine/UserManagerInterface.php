<?php

namespace AppVerk\Components\Doctrine;

use Gedmo\Timestampable\Timestampable;
use AppVerk\Components\Model\UserInterface;

interface UserManagerInterface extends Timestampable, ManagerInterface
{
    public function findUserByEmail(string $email);

    public function findUserByUsername(string $username);

    public function updateUser(UserInterface $user);

    public function getUser($id) : ?UserInterface;

    public function getUserByToken(string $token): UserInterface;

    public function encodePassword(UserInterface $user, string $password): string;

    public function findUserByPassword(string $password): ?UserInterface;

    public function removeUser(UserInterface $user);
}

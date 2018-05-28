<?php

namespace AppVerk\Components\Doctrine;

use Gedmo\Timestampable\Timestampable;
use AppVerk\Components\Model\UserInterface;

interface UserManagerInterface extends Timestampable, ManagerInterface
{
    public function findUserByEmail($email);

    public function findUserByUsername($username);

    public function updateUser(UserInterface $user);

    public function getUser($id);

    public function getUserByToken($token);

    public function encodePassword(UserInterface $user, $password);

    public function findUserByPassword($password);

    public function removeUser(UserInterface $user);
}

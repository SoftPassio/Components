<?php

namespace AppVerk\Components\Doctrine;

interface UserProviderInterface
{
    public function findUserByUsername($username);
}

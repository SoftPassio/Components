<?php

namespace SoftPassio\Components\Doctrine;

interface UserProviderInterface
{
    public function findUserByUsername($username);
}

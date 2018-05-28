<?php

namespace AppVerk\Components\Doctrine;

use AppVerk\Components\Model\ApiClientInterface;
use Symfony\Component\Security\Core\User\UserInterface;

interface ApiAccessTokenManagerInterface
{
    public function bindTokenToUser($token, UserInterface $user, ApiClientInterface $apiClient);
}

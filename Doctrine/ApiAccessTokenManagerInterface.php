<?php

namespace SoftPassio\Components\Doctrine;

use SoftPassio\Components\Model\ApiClientInterface;
use Symfony\Component\Security\Core\User\UserInterface;

interface ApiAccessTokenManagerInterface
{
    public function bindTokenToUser($token, UserInterface $user, ApiClientInterface $apiClient);
}

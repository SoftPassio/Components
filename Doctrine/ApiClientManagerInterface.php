<?php

namespace AppVerk\Components\Doctrine;

interface ApiClientManagerInterface
{
    public function findClientByCredentials($clientId, $secret);

    public function clientExists($clientId);
}

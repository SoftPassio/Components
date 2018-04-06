<?php

namespace AppVerk\Components\Doctrine;

interface ApiClientManagerInterface
{
    public function findClientByCredentials(string $clientId, string $secret);

    public function clientExists(string $clientId): bool;
}

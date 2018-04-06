<?php

namespace AppVerk\Components\Doctrine;

interface CacheableEntityInterface
{
    public function getRedisKeys(): array;

    public function getRedisAddKey();
}

<?php

namespace AppVerk\Components\Doctrine;

interface CacheableEntityInterface
{
    public function getRedisKeys();

    public function getRedisAddKey();
}

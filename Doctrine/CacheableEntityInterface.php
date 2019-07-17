<?php

namespace SoftPassio\Components\Doctrine;

interface CacheableEntityInterface
{
    public function getRedisKeys();

    public function getRedisAddKey();
}

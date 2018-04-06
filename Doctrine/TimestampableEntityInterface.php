<?php

namespace AppVerk\Components\Doctrine;

use Gedmo\Timestampable\Timestampable;

interface TimestampableEntityInterface extends Timestampable
{
    public function getCreatedAt();

    public function getUpdatedAt();
}

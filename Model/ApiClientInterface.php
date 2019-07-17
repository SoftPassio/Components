<?php

namespace SoftPassio\Components\Model;

interface ApiClientInterface
{
    public function getClientId();

    public function getSecret();
}

<?php

namespace AppVerk\Components\Doctrine;

interface LogEntryEntityInterface
{
    public function setVersion($version);

    public function setAction($action);

    public function setUsername($username);

    public function setObjectClass($objectClass);

    public function setObjectId($objectId);

    public function setData($data);

    public function setLoggedAt();

    public function getAction();

    public function getUsername();

    public function getObjectClass();

    public function getObjectId();

    public function getLoggedAt();

    public function getVersion();
}

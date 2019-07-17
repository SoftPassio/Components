<?php

namespace SoftPassio\Components\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

interface ManagerInterface
{
    public function __construct($className, ObjectManager $objectManager);

    /**
     * @return ObjectRepository
     */
    public function getRepository();

    public function flush();

}

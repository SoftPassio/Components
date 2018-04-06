<?php

namespace AppVerk\Components\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

abstract class AbstractManager implements ManagerInterface
{
    /** @var ObjectManager */
    protected $objectManager;

    protected $className;

    public function __construct(string $className, ObjectManager $objectManager)
    {
        $this->className = $className;
        $this->objectManager = $objectManager;
    }

    public function persistAndFlash(EntityInterface $entity)
    {
        $this->objectManager->persist($entity);
        $this->objectManager->flush();
    }

    public function persist(EntityInterface $article)
    {
        $this->objectManager->persist($article);
    }

    public function flush()
    {
        $this->objectManager->flush();
    }

    public function remove(EntityInterface $article)
    {
        $this->objectManager->remove($article);
        $this->objectManager->flush();
    }

    public function find(int $id) : EntityInterface
    {
        return $this->getRepository()->find($id);
    }

    public function refresh(EntityInterface $Field)
    {
        $this->objectManager->refresh($Field);
    }

    /**
     * @return ObjectRepository
     */
    public function getRepository(): ObjectRepository
    {
        /** @var ObjectRepository $objectRepository */
        $objectRepository = $this->objectManager->getRepository($this->className);

        return $objectRepository;
    }
}

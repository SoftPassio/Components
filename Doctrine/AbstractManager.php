<?php

namespace SoftPassio\Components\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

abstract class AbstractManager implements ManagerInterface
{
    /** @var EntityManagerInterface */
    protected $entityManager;

    protected $className;

    public function __construct($className, EntityManagerInterface $entityManager)
    {
        $this->className = $className;
        $this->entityManager = $entityManager;
    }

    public function persistAndFlush(EntityInterface $entity)
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    public function persist(EntityInterface $entity)
    {
        $this->entityManager->persist($entity);
    }

    public function flush()
    {
        $this->entityManager->flush();
    }

    public function remove(EntityInterface $entity)
    {
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
    }

    public function find($id)
    {
        return $this->getRepository()->find($id);
    }

    public function refresh(EntityInterface $Field)
    {
        $this->entityManager->refresh($Field);
    }

    /**
     * @return EntityRepository
     */
    public function getRepository()
    {
        /** @var EntityRepository $entityRepository */
        $entityRepository = $this->entityManager->getRepository($this->className);

        return $entityRepository;
    }
}

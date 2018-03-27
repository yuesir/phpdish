<?php

declare(strict_types=1);

namespace PHPDish\Bundle\WebBundle\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class FriendLinkManager implements FriendLinkManagerInterface
{
    /**
     * @var EntityRepository
     */
    protected $friendLinkRepository;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->friendLinkRepository = $this->entityManager
            ->getRepository('PHPDishWebBundle:FriendLink');
    }

    /**
     * {@inheritdoc}
     */
    public function findEnabledFriendLinks($limit)
    {
        return $this->friendLinkRepository->findBy([], ['priority' => 'asc'], $limit);
    }
}
<?php

namespace AppBundle\Listener;

use AppBundle\Entity\Movie;
use AppBundle\Model\SoftDeletable;
use AppBundle\Service\Encoder\IdEncoder;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;

/**
 * Class DoctrineListener.
 */
class DoctrineListener implements EventSubscriber
{
    /**
     * @var IdEncoder
     */
    private $idEncoder;

    /**
     * DoctrineListener constructor.
     *
     * @param IdEncoder $idEncoder
     */
    public function __construct(IdEncoder $idEncoder)
    {
        $this->idEncoder = $idEncoder;
    }

    /**
     * @return array
     */
    public function getSubscribedEvents()
    {
        return [
            'postLoad',
            'preFlush',
        ];
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        /**
         * @var Movie
         */
        $movie = $args->getObject();
        $hash = $this->idEncoder->encode($movie->getId());
        $movie->setId($hash);
    }

    /**
     * @param PreFlushEventArgs $event
     */
    public function preFlush(PreFlushEventArgs $event)
    {
        $em = $event->getEntityManager();
        foreach ($em->getUnitOfWork()->getScheduledEntityDeletions() as $object) {
            if ($object instanceof SoftDeletable) {
                if ($object->getDeletedAt() instanceof \Datetime) {
                    continue;
                }
                $object->setDeletedAt(new \DateTime());
                $em->merge($object);
                $em->persist($object);
            }
        }
    }
}

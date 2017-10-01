<?php

namespace AppBundle\Model;

/**
 * Interface SoftDeletable.
 */
interface SoftDeletable
{
    /**
     * @return \DateTime
     */
    public function getDeletedAt();

    /**
     * @param \DateTime $datetime
     *
     * @return mixed
     */
    public function setDeletedAt(\DateTime $datetime);
}

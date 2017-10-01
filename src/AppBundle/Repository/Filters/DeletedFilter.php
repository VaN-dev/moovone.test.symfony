<?php

namespace AppBundle\Repository\Filters;

use Doctrine\ORM\Mapping\ClassMetaData;
use Doctrine\ORM\Query\Filter\SQLFilter;

/**
 * Class DeletedFilter.
 */
class DeletedFilter extends SQLFilter
{
    /**
     * @param ClassMetaData $targetEntity
     * @param string        $targetTableAlias
     *
     * @return string
     */
    public function addFilterConstraint(ClassMetaData $targetEntity, $targetTableAlias)
    {
        if ($targetEntity->hasField('deletedAt')) {
            return $targetTableAlias.'.deleted_at IS NULL';
        }

        return '';
    }
}

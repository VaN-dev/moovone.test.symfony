<?php

namespace AppBundle\Service\Encoder;

use Hashids\Hashids;

/**
 * Class IdEncoder
 * @package AppBundle\Service\Encoder
 */
class IdEncoder
{
    /**
     * @var Hashids
     */
    private $encoder;

    /**
     * IdEncoder constructor.
     */
    public function __construct()
    {
        $this->encoder = new Hashids('salt');
    }

    /**
     * @param $id
     * @return string
     */
    public function encode($id)
    {
        return $hash = $this->encoder->encode($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function decode($id)
    {
        return $this->encoder->decode($id)[0];
    }
}
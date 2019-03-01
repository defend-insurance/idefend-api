<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 22:00
 */

namespace IDefendApi\DataStorage;


use IDefendApi\Exception\ApiReplyExcetion;

class PolicyDetailExtra extends DataStorage
{
    /** @var string */
    public $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return PolicyDetailExtra
     */
    public function setName(string $name): PolicyDetailExtra
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param array $array
     * @return self
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public static function __fromArray(array $array)
    {
        /** @var static $return */
        $return = parent::__fromArray($array);
        return $return;
    }
}
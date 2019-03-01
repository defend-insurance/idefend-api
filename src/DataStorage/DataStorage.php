<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 8:36
 */

namespace IDefendApi\DataStorage;


use IDefendApi\Exception\ApiReplyExcetion;
use IDefendApi\Service\Utils;

class DataStorage
{
    /**
     * @param $name
     * @param $value
     * @return $this
     */
    public function __set($name, $value)
    {

        return $this->{"set" . ucfirst(Utils::camelize($name))}($value);
    }

    /**
     * @param array $array
     * @return self
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public static function __fromArray(array $array)
    {
        $entity = new static();
        $reflect = new \ReflectionClass(static::class);
        $vars = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
        foreach ($vars as $reflectionProperty) {
            $name = $reflectionProperty->getName();
            $entity->__set($name, $array[$name]);
            unset($array[$name]);
        }
        if (!empty($array)) {
            throw new ApiReplyExcetion("Unprocessed Data:" . json_encode($array));
        }

        return $entity;
    }
}
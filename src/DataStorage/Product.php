<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 6:32
 */

namespace IDefendApi\DataStorage;


use IDefendApi\Exception\ApiReplyExcetion;

class Product extends DataStorage
{

    /** @var string */
    public $id;

    /** @var string */
    public $name;


    /**
     * @param $id
     * @param $name
     * @return Product
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public static function newInstance($id, $name)
    {
        return self::__fromArray(["id" => $id, "name" => $name]);
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

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


}
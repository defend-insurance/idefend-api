<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 10.03.2019
 * Time: 19:29
 */

namespace IDefendApi\DataStorage;


class ListItem extends DataStorage
{

    /** @var string */
    public $id;

    /** @var string */
    public $name;

    /**
     * @param array $array
     * @return DataStorage|ListItem
     * @throws \IDefendApi\Exception\ApiReplyExcetion
     * @throws \ReflectionException
     */
    public static function __fromArray(array $array)
    {
        return parent::__fromArray($array);
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
     * @return ListItem
     */
    public function setId(string $id): ListItem
    {
        $this->id = $id;
        return $this;
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
     * @return ListItem
     */
    public function setName(string $name): ListItem
    {
        $this->name = $name;
        return $this;
    }




}
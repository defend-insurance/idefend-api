<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 11:26
 */

namespace IDefendApi\DataStorage;


use IDefendApi\Exception\ApiReplyExcetion;

class Extra extends DataStorage
{
    /** @var string */
    public $id;
    /** @var string */
    public $name;
    /** @var string */
    public $selected;


    /**
     * @param $id
     * @param $name
     * @param string $selected
     * @return self
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public static function newInstance($id, $name, $selected = 'false')
    {
        return self::__fromArray(["id" => $id, "name" => $name, 'selected' => $selected]);
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
     * @return Extra
     */
    public function setId(string $id): Extra
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
     * @return Extra
     */
    public function setName(string $name): Extra
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSelected(): string
    {
        return $this->selected;
    }

    /**
     * @param string $selected
     * @return Extra
     */
    public function setSelected(string $selected): Extra
    {
        $this->selected = $selected;
        return $this;
    }


}
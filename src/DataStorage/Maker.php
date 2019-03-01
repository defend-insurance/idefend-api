<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 6:32
 */

namespace IDefendApi\DataStorage;


use IDefendApi\Exception\ApiReplyExcetion;

class Maker extends DataStorage
{

    /** @var string */
    public $id;

    /** @var string */
    public $label;

    /**
     * @param $id
     * @param $label
     * @return Maker
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public static function newInstance($id, $label)
    {
        return self::__fromArray(["id" => $id, "label" => $label]);
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
     * @return Maker
     */
    public function setId(string $id): Maker
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Maker
     */
    public function setLabel(string $label): Maker
    {
        $this->label = $label;
        return $this;
    }

}
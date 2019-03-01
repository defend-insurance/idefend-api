<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 11:26
 */

namespace IDefendApi\DataStorage;


use IDefendApi\Exception\ApiReplyExcetion;

class Loading extends DataStorage
{
    /** @var string */
    public $id;
    /** @var string */
    public $type;
    /** @var string */
    public $value;
    /** @var string */
    public $selected;


    /**
     * @param $id
     * @param $type
     * @param $value
     * @param string $selected
     * @return self
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public static function newInstance($id, $type, $value, $selected = 'false')
    {
        return self::__fromArray(["id" => $id, "type" => $type, 'value' => $value, 'selected' => $selected]);
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
     * @return Loading
     */
    public function setId(string $id): Loading
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Loading
     */
    public function setType(string $type): Loading
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Loading
     */
    public function setValue(string $value): Loading
    {
        $this->value = $value;
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
     * @return Loading
     */
    public function setSelected(string $selected): Loading
    {
        $this->selected = $selected;
        return $this;
    }


}
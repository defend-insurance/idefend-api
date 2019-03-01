<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 6:32
 */

namespace IDefendApi\DataStorage;

use IDefendApi\Exception\ApiReplyExcetion;

class Model extends DataStorage
{

    /** @var string */
    public $id;

    /** @var string */
    public $label;

    /** @var Maker|null */
    public $make;


    /**
     * @param $id
     * @param $label
     * @param Maker $maker
     * @return DataStorage|Model
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public static function newInstance($id, $label, Maker $maker)
    {
        return self::__fromArray(["id" => $id, "label" => $label, 'make' => $maker]);
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
     * @return Model
     */
    public function setId(string $id): Model
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
     * @return Model
     */
    public function setLabel(string $label): Model
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return Maker|null
     */
    public function getMake(): ?Maker
    {
        return $this->make;
    }

    /**
     * @param array|Maker|null $make
     * @return Model
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setMake($make): Model
    {
        if (is_array($make)) {
            $make = Maker::__fromArray($make);
        }
        $this->make = $make;
        return $this;
    }

}
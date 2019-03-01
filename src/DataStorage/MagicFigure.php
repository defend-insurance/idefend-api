<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 11:26
 */

namespace IDefendApi\DataStorage;


use IDefendApi\Exception\ApiReplyExcetion;

class MagicFigure extends DataStorage
{
    /** @var string */
    public $min;
    /** @var string */
    public $max;
    /** @var string */
    public $comms;

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
    public function getMin(): string
    {
        return $this->min;
    }

    /**
     * @param string $min
     * @return MagicFigure
     */
    public function setMin(string $min): MagicFigure
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @return string
     */
    public function getMax(): string
    {
        return $this->max;
    }

    /**
     * @param string $max
     * @return MagicFigure
     */
    public function setMax(string $max): MagicFigure
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @return string
     */
    public function getComms(): string
    {
        return $this->comms;
    }

    /**
     * @param string $comms
     * @return MagicFigure
     */
    public function setComms(string $comms): MagicFigure
    {
        $this->comms = $comms;
        return $this;
    }


}
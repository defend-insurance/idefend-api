<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 12:05
 */

namespace IDefendApi\DataStorage;


use IDefendApi\Exception\ApiReplyExcetion;

class Coverage extends DataStorage
{

    /** @var string */
    public $id;
    /** @var string */
    public $name;
    /** @var string */
    public $premium;
    /** @var string */
    public $product;
    /** @var MagicFigure */
    public $magic_figures;
    /** @var string */
    public $selected;

    /**
     * @param $id
     * @param $name
     * @return static
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
     * @return Coverage
     */
    public function setId(string $id): Coverage
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
     * @return Coverage
     */
    public function setName(string $name): Coverage
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPremium(): string
    {
        return $this->premium;
    }

    /**
     * @param string $premium
     * @return Coverage
     */
    public function setPremium(string $premium): Coverage
    {
        $this->premium = $premium;
        return $this;
    }

    /**
     * @return string
     */
    public function getProduct(): string
    {
        return $this->product;
    }

    /**
     * @param string $product
     * @return Coverage
     */
    public function setProduct(string $product): Coverage
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return MagicFigure
     */
    public function getMagicFigures(): MagicFigure
    {
        return $this->magic_figures;
    }

    /**
     * @param MagicFigure|array $magic_figures
     * @return Coverage
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setMagicFigures($magic_figures): Coverage
    {
        if (is_array($magic_figures)) {
            $magic_figures = MagicFigure::__fromArray($magic_figures);
        }
        $this->magic_figures = $magic_figures;
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
     * @return Coverage
     */
    public function setSelected(string $selected): Coverage
    {
        $this->selected = $selected;
        return $this;
    }


}
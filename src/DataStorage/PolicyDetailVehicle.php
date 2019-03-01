<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 22:00
 */

namespace IDefendApi\DataStorage;


class PolicyDetailVehicle extends DataStorage
{
    /** @var int */
    public $make_id;
    /** @var int */
    public $model_id;
    /** @var string */
    public $make;
    /** @var string */
    public $model;

    /**
     * @return int
     */
    public function getMakeId(): int
    {
        return $this->make_id;
    }

    /**
     * @param int $make_id
     * @return PolicyDetailVehicle
     */
    public function setMakeId(int $make_id): PolicyDetailVehicle
    {
        $this->make_id = $make_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getModelId(): int
    {
        return $this->model_id;
    }

    /**
     * @param int $model_id
     * @return PolicyDetailVehicle
     */
    public function setModelId(int $model_id): PolicyDetailVehicle
    {
        $this->model_id = $model_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getMake(): string
    {
        return $this->make;
    }

    /**
     * @param string $make
     * @return PolicyDetailVehicle
     */
    public function setMake(string $make): PolicyDetailVehicle
    {
        $this->make = $make;
        return $this;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     * @return PolicyDetailVehicle
     */
    public function setModel(string $model): PolicyDetailVehicle
    {
        $this->model = $model;
        return $this;
    }

}
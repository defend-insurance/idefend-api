<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 21:32
 */

namespace IDefendApi\DataStorage;


use IDefendApi\Exception\ApiReplyExcetion;

class PolicyDetail extends DataStorage
{
    /** @var PolicyDetailPolicy */
    public $Policy;
    /** @var PolicyDetailVehicle */
    public $Vehicle;

    /** @var PolicyDetailExtra[] */
    public $Extra = array();

    /** @var PolicyDetailLoading[] */
    public $Loading = array();

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
     * @return PolicyDetailPolicy
     */
    public function getPolicy(): PolicyDetailPolicy
    {
        return $this->Policy;
    }

    /**
     * @param PolicyDetailPolicy|array $Policy
     * @return PolicyDetail
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setPolicy($Policy): PolicyDetail
    {
        if (is_array($Policy)) {
            $Policy = PolicyDetailPolicy::__fromArray($Policy);
        }
        $this->Policy = $Policy;
        return $this;
    }

    /**
     * @return PolicyDetailVehicle
     */
    public function getVehicle(): PolicyDetailVehicle
    {
        return $this->Vehicle;
    }

    /**
     * @param PolicyDetailVehicle|array $Vehicle
     * @return PolicyDetail
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setVehicle($Vehicle): PolicyDetail
    {
        if (is_array($Vehicle)) {
            $Vehicle = PolicyDetailVehicle::__fromArray($Vehicle);
        }
        $this->Vehicle = $Vehicle;
        return $this;
    }

    /**
     * @return PolicyDetailExtra[]
     */
    public function getExtra(): array
    {
        return $this->Extra;
    }

    /**
     * @param PolicyDetailExtra[] $Extra
     * @return PolicyDetail
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setExtra(?array $Extra): PolicyDetail
    {
        if (is_null($Extra)) {
            $Extra = array();
        }
        foreach ($Extra as $no => $item) {
            if (is_array($item)) {
                $Extra[$no] = PolicyDetailExtra::__fromArray($item);
            }
        }
        $this->Extra = $Extra;
        return $this;
    }

    /**
     * @return PolicyDetailLoading[]
     */
    public function getLoading(): array
    {
        return $this->Loading;
    }

    /**
     * @param PolicyDetailLoading[] $Loading
     * @return PolicyDetail
     * @throws ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setLoading(?array $Loading): PolicyDetail
    {
        if (is_null($Loading)) {
            $Loading = array();
        }
        foreach ($Loading as $no => $item) {
            if (is_array($item)) {
                $Loading[$no] = PolicyDetailLoading::__fromArray($item);
            }
        }
        $this->Loading = $Loading;
        return $this;
    }


}
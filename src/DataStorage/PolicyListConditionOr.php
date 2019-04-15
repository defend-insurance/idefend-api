<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 06.03.2019
 * Time: 5:57
 */

namespace IDefendApi\DataStorage;


class PolicyListConditionOr extends PolicyListCondition
{

    public $OR=array();

    /**
     * @param array|PolicyListCondition $condition
     * @return PolicyListCondition
     */
    public function add($condition)
    {
        $this->OR[]=$condition;
        return $this;
    }
}
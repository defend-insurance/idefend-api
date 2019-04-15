<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 05.03.2019
 * Time: 16:52
 */

namespace IDefendApi\DataStorage;


use http\Exception\InvalidArgumentException;

abstract class PolicyListCondition
{
    const CO_EQ="=";
    const CO_LIKE="LIKE";
    const CO_GT=">";
    const CO_LT="<";
    const CO_GET=">=";
    const CO_LET="<=";

    const COMPARISON_OPERATORS=array(self::CO_EQ,self::CO_LIKE,self::CO_GT,self::CO_LT,self::CO_GET,self::CO_LET);

    public function getAvailableFields()
    {
        if (isEmpty(self::$fields)) {
            $reflect = new \ReflectionClass(PolicyDetailPolicy::class);
            self::$fields = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
        }
        return self::$fields;
    }

    private static function checkPolicyField($fieldName)
    {
        if (PolicyDetailPolicy::checkField($fieldName)) return true;
        throw new \InvalidArgumentException("Not valid policy Field: ".$fieldName);
    }


    /**
     * @param $fieldName
     * @param $operator
     * @param $value
     * @return array
     */
    static function createConditionItem($fieldName,$operator,$value)
    {
        if (!self::checkPolicyField($fieldName)) throw new InvalidArgumentException("Not valid operator ".$operator);
        $condition=["Policy.".$fieldName." ".$operator =>$value];
        return $condition;

    }

    /**
     * @param PolicyListCondition|array $condition
     * @return PolicyListCondition
     */
    public abstract function add($condition);



}
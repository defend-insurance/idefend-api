<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 06.03.2019
 * Time: 12:04
 */

namespace IDefendApi\DataStorage;


class PolicyListResult extends DataStorage
{

    /** @var PolicyDetailPolicy[] */
    public $Policies=array();

    /** @var PolicyListResultPaging */
    public $Paging;

    /**
     * @param array $array
     * @return DataStorage|PolicyListResult
     * @throws \IDefendApi\Exception\ApiReplyExcetion
     * @throws \ReflectionException
     */
    public static function __fromArray(
       array $array
    ) {
        $array["Policies"]=array();
        foreach ($array as $key=>$value)
        {
            if (is_int($key))
            {
                $array["Policies"][]=$value['Policy'];
                unset($array[$key]);
            }
        }
        return parent::__fromArray($array);

    }

    /**
     * @return PolicyDetailPolicy[]
     */
    public function getPolicies(): array
    {
        return $this->Policies;
    }

    /**
     * @param PolicyDetailPolicy[]|array $Policies
     * @return PolicyListResult
     * @throws \IDefendApi\Exception\ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setPolicies(array $Policies): PolicyListResult
    {
        foreach ($Policies as $key =>$value)
        {
            if (is_array($value))
            {
                $Policies[$key]=PolicyDetailPolicy::__fromArray($value);
            }
        }
        $this->Policies = $Policies;
        return $this;
    }

    /**
     * @return PolicyListResultPaging
     */
    public function getPaging(): PolicyListResultPaging
    {
        return $this->Paging;
    }

    /**
     * @param PolicyListResultPaging|array $Paging
     * @return PolicyListResult
     * @throws \IDefendApi\Exception\ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setPaging( $Paging): PolicyListResult
    {
        if (is_array($Paging))
        {
            $Paging=PolicyListResultPaging::__fromArray($Paging);
        }
        $this->Paging = $Paging;
        return $this;
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 10.03.2019
 * Time: 21:01
 */

namespace IDefendApi\DataStorage;


class CancellationCodificators extends DataStorage
{

    /** @var ListItem[]*/
    public $cancellation_reason=array();

    /** @var ListItem[] */
    public $cancellation_refund=array();

    /** @var ListItem[] */
    public $refund_paid_to=array();

    /**
     * @param array $array
     * @return DataStorage|CancellationCodificators
     * @throws \IDefendApi\Exception\ApiReplyExcetion
     * @throws \ReflectionException
     */
    public static function __fromArray(array $array)
    {
        return parent::__fromArray($array);
    }

    /**
     * @return ListItem[]
     */
    public function getCancellationReason(): array
    {
        return $this->cancellation_reason;
    }

    /**
     * @param array $cancellation_reason
     * @return CancellationCodificators
     * @throws \IDefendApi\Exception\ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setCancellationReason(array $cancellation_reason): CancellationCodificators
    {
        foreach ($cancellation_reason as $key=>$value)
        {
            if (is_string($value))
            {
                $cancellation_reason[$key]=ListItem::__fromArray(array('id'=>$key,'name'=>$value));
            }
        }
        $this->cancellation_reason = $cancellation_reason;
        return $this;
    }

    /**
     * @return ListItem[]
     */
    public function getCancellationRefund(): array
    {
        return $this->cancellation_refund;
    }

    /**
     * @param array $cancellation_refund
     * @return CancellationCodificators
     * @throws \IDefendApi\Exception\ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setCancellationRefund(array $cancellation_refund): CancellationCodificators
    {
        foreach ($cancellation_refund as $key=>$value)
        {
            if (is_string($value))
            {
                $cancellation_refund[$key]=ListItem::__fromArray(array('id'=>$key,'name'=>$value));
            }
        }
        $this->cancellation_refund = $cancellation_refund;
        return $this;
    }

    /**
     * @return ListItem[]
     */
    public function getRefundPaidTo(): array
    {
        return $this->refund_paid_to;
    }

    /**
     * @param array $refund_paid_to
     * @return CancellationCodificators
     * @throws \IDefendApi\Exception\ApiReplyExcetion
     * @throws \ReflectionException
     */
    public function setRefundPaidTo(array $refund_paid_to): CancellationCodificators
    {
        foreach ($refund_paid_to as $key=>$value)
        {
            if (is_string($value))
            {
                $refund_paid_to[$key]=ListItem::__fromArray(array('id'=>$key,'name'=>$value));
            }
        }
        $this->refund_paid_to = $refund_paid_to;
        return $this;
    }


}
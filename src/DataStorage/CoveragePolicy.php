<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 9:50
 */

namespace IDefendApi\DataStorage;


use IDefendApi\Exception\ApiReplyExcetion;

class CoveragePolicy extends DataStorage
{
    /** @var string */
    public $product_id = '';
    /** @var string */
    public $int_model_id = '';
    /** @var string */
    public $auto_model_id = '';
    /** @var string */
    public $vehicle_model_derivative = '';
    /** @var string */
    public $vehicle_reg_date = '';
    /** @var string */
    public $vehicle_purchase_date = '';
    /** @var string */
    public $vehicle_purchase_price = '';
    /** @var string */
    public $vehicle_mfg_inception = '';
    /** @var string */
    public $vehicle_mfg_warr_term = '';
    /** @var string */
    public $vehicle_mfg_warr_km = '';
    /** @var string */
    public $vehicle_odometer = '';
    /** @var string */
    public $vehicle_engine_size = '';
    /** @var string */
    public $payment_term = '';
    /** @var string */
    public $ins_term = '';
    /** @var string */
    public $vat_included = '';
    /** @var string */
    public $vat_reclaimable = '';

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
    public function getProductId(): string
    {
        return $this->product_id;
    }

    /**
     * @param string $product_id
     * @return CoveragePolicy
     */
    public function setProductId(string $product_id): CoveragePolicy
    {
        $this->product_id = $product_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntModelId(): string
    {
        return $this->int_model_id;
    }

    /**
     * @param string $int_model_id
     * @return CoveragePolicy
     */
    public function setIntModelId(string $int_model_id): CoveragePolicy
    {
        $this->int_model_id = $int_model_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getAutoModelId(): string
    {
        return $this->auto_model_id;
    }

    /**
     * @param string $auto_model_id
     * @return CoveragePolicy
     */
    public function setAutoModelId(string $auto_model_id): CoveragePolicy
    {
        $this->auto_model_id = $auto_model_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleModelDerivative(): string
    {
        return $this->vehicle_model_derivative;
    }

    /**
     * @param string $vehicle_model_derivative
     * @return CoveragePolicy
     */
    public function setVehicleModelDerivative(string $vehicle_model_derivative): CoveragePolicy
    {
        $this->vehicle_model_derivative = $vehicle_model_derivative;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleRegDate(): string
    {
        return $this->vehicle_reg_date;
    }

    /**
     * @param string $vehicle_reg_date
     * @return CoveragePolicy
     */
    public function setVehicleRegDate(string $vehicle_reg_date): CoveragePolicy
    {
        $this->vehicle_reg_date = $vehicle_reg_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehiclePurchaseDate(): string
    {
        return $this->vehicle_purchase_date;
    }

    /**
     * @param string $vehicle_purchase_date
     * @return CoveragePolicy
     */
    public function setVehiclePurchaseDate(string $vehicle_purchase_date): CoveragePolicy
    {
        $this->vehicle_purchase_date = $vehicle_purchase_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehiclePurchasePrice(): string
    {
        return $this->vehicle_purchase_price;
    }

    /**
     * @param string $vehicle_purchase_price
     * @return CoveragePolicy
     */
    public function setVehiclePurchasePrice(string $vehicle_purchase_price): CoveragePolicy
    {
        $this->vehicle_purchase_price = $vehicle_purchase_price;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleMfgInception(): string
    {
        return $this->vehicle_mfg_inception;
    }

    /**
     * @param string $vehicle_mfg_inception
     * @return CoveragePolicy
     */
    public function setVehicleMfgInception(string $vehicle_mfg_inception): CoveragePolicy
    {
        $this->vehicle_mfg_inception = $vehicle_mfg_inception;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleMfgWarrTerm(): string
    {
        return $this->vehicle_mfg_warr_term;
    }

    /**
     * @param string $vehicle_mfg_warr_term
     * @return CoveragePolicy
     */
    public function setVehicleMfgWarrTerm(string $vehicle_mfg_warr_term): CoveragePolicy
    {
        $this->vehicle_mfg_warr_term = $vehicle_mfg_warr_term;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleMfgWarrKm(): string
    {
        return $this->vehicle_mfg_warr_km;
    }

    /**
     * @param string $vehicle_mfg_warr_km
     * @return CoveragePolicy
     */
    public function setVehicleMfgWarrKm(string $vehicle_mfg_warr_km): CoveragePolicy
    {
        $this->vehicle_mfg_warr_km = $vehicle_mfg_warr_km;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleOdometer(): string
    {
        return $this->vehicle_odometer;
    }

    /**
     * @param string $vehicle_odometer
     * @return CoveragePolicy
     */
    public function setVehicleOdometer(string $vehicle_odometer): CoveragePolicy
    {
        $this->vehicle_odometer = $vehicle_odometer;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleEngineSize(): string
    {
        return $this->vehicle_engine_size;
    }

    /**
     * @param string $vehicle_engine_size
     * @return CoveragePolicy
     */
    public function setVehicleEngineSize(string $vehicle_engine_size): CoveragePolicy
    {
        $this->vehicle_engine_size = $vehicle_engine_size;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentTerm(): string
    {
        return $this->payment_term;
    }

    /**
     * @param string $payment_term
     * @return CoveragePolicy
     */
    public function setPaymentTerm(string $payment_term): CoveragePolicy
    {
        $this->payment_term = $payment_term;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsTerm(): string
    {
        return $this->ins_term;
    }

    /**
     * @param string $ins_term
     * @return CoveragePolicy
     */
    public function setInsTerm(string $ins_term): CoveragePolicy
    {
        $this->ins_term = $ins_term;
        return $this;
    }

    /**
     * @return string
     */
    public function getVatIncluded(): string
    {
        return $this->vat_included;
    }

    /**
     * @param string $vat_included
     * @return CoveragePolicy
     */
    public function setVatIncluded(string $vat_included): CoveragePolicy
    {
        $this->vat_included = $vat_included;
        return $this;
    }

    /**
     * @return string
     */
    public function getVatReclaimable(): string
    {
        return $this->vat_reclaimable;
    }

    /**
     * @param string $vat_reclaimable
     * @return CoveragePolicy
     */
    public function setVatReclaimable(string $vat_reclaimable): CoveragePolicy
    {
        $this->vat_reclaimable = $vat_reclaimable;
        return $this;
    }

}
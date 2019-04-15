<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 21:35
 */

namespace IDefendApi\DataStorage;


use IDefendApi\Exception\ApiReplyExcetion;

class PolicyDetailPolicy extends DataStorage
{
    /** @var string|null */
    public $id;
    /** @var string|null */
    public $policy_no;
    /** @var string|null */
    public $payment_term;
    /** @var string|null */
    public $ins_term;
    /** @var string|null */
    public $installments;
    /** @var string|null */
    public $auto_model_id;
    /** @var string|null */
    public $vehicle_engine_size;
    /** @var string|null */
    public $vehicle_mfg_warr_term;
    /** @var string|null */
    public $vehicle_mfg_warr_km;
    /** @var string|null */
    public $vehicle_reg_date;
    /** @var string|null */
    public $vehicle_odometer;
    /** @var string|null */
    public $vehicle_purchase_date;
    /** @var string|null */
    public $vehicle_purchase_price;
    /** @var string|null */
    public $vat_reclaimable;
    /** @var string|null */
    public $vat_included;
    /** @var string|null */
    public $vehicle_mfg_inception;
    /** @var string|null */
    public $vehicle_vin;
    /** @var string|null */
    public $vehicle_reg_no;
    /** @var string|null */
    public $vehicle_prev_owners_no;
    /** @var string|null */
    public $vehicle_model_derivative;
    /** @var string|null */
    public $customer_type;
    /** @var string|null */
    public $customer_title_id;
    /** @var string|null */
    public $customer_first_name;
    /** @var string|null */
    public $customer_last_name;
    /** @var string|null */
    public $customer_company_name;
    /** @var string|null */
    public $customer_id_no;
    /** @var string|null */
    public $customer_address;
    /** @var string|null */
    public $customer_address2;
    /** @var string|null */
    public $customer_city;
    /** @var string|null */
    public $customer_post_code;
    /** @var string|null */
    public $customer_tel;
    /** @var string|null */
    public $customer_email;
    /** @var string|null */
    public $customer_had_claims;
    /** @var string|null */
    public $insured_is_coverholder;
    /** @var string|null */
    public $insured_type;
    /** @var string|null */
    public $insured_title_id;
    /** @var string|null */
    public $insured_first_name;
    /** @var string|null */
    public $insured_last_name;
    /** @var string|null */
    public $insured_company_name;
    /** @var string|null */
    public $insured_id_no;
    /** @var string|null */
    public $insured_address;
    /** @var string|null */
    public $insured_address2;
    /** @var string|null */
    public $insured_city;
    /** @var string|null */
    public $insured_post_code;
    /** @var string|null */
    public $insured_tel;
    /** @var string|null */
    public $insured_email;
    /** @var string|null */
    public $beneficiary_is_coverholder;
    /** @var string|null */
    public $beneficiary_is_insured;
    /** @var string|null */
    public $beneficiary_type;
    /** @var string|null */
    public $beneficiary_title_id;
    /** @var string|null */
    public $beneficiary_first_name;
    /** @var string|null */
    public $beneficiary_last_name;
    /** @var string|null */
    public $beneficiary_company_name;
    /** @var string|null */
    public $beneficiary_id_no;
    /** @var string|null */
    public $beneficiary_address;
    /** @var string|null */
    public $beneficiary_address2;
    /** @var string|null */
    public $beneficiary_city;
    /** @var string|null */
    public $beneficiary_post_code;
    /** @var string|null */
    public $beneficiary_tel;
    /** @var string|null */
    public $beneficiary_email;
    /** @var string|null */
    public $owner_is_coverholder;
    /** @var string|null */
    public $owner_type;
    /** @var string|null */
    public $owner_title_id;
    /** @var string|null */
    public $owner_first_name;
    /** @var string|null */
    public $owner_last_name;
    /** @var string|null */
    public $owner_company_name;
    /** @var string|null */
    public $owner_id_no;
    /** @var string|null */
    public $owner_address;
    /** @var string|null */
    public $owner_address2;
    /** @var string|null */
    public $owner_city;
    /** @var string|null */
    public $owner_post_code;
    /** @var string|null */
    public $owner_tel;
    /** @var string|null */
    public $owner_email;
    /** @var string|null */
    public $policy_inception_date;
    /** @var string|null */
    public $policy_expiry_date;
    /** @var string|null */
    public $notes;
    /** @var string|null */
    public $product_id;
    /** @var string|null */
    public $status_locked_on;
    /** @var string|null */
    public $status_opened_on;
    /** @var string|null */
    public $status_certified_on;
    /** @var string|null */
    public $status_paid_on;
    /** @var string|null */
    public $status_canceled_on;
    /** @var string|null */
    public $cancellation_reason;
    /** @var string|null */
    public $cancellation_refund;
    /** @var string|null */
    public $premium;
    /** @var string|null */
    public $refund_paid_to;
    /** @var string|null */
    public $authorization_code_verified;
    /** @var string|null */
    public $created;
    /** @var string|null */
    public $coverage_id;
    /** @var string|null */
    public $coverage_name;
    /** @var string|null */
    public $int_model_id;
    /** @var string|null */
    public $payment_method;
    /** @var string|null */
    public $claim_limit;


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
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return PolicyDetailPolicy
     */
    public function setId(?string $id): PolicyDetailPolicy
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPolicyNo(): ?string
    {
        return $this->policy_no;
    }

    /**
     * @param string $policy_no
     * @return PolicyDetailPolicy
     */
    public function setPolicyNo(?string $policy_no): PolicyDetailPolicy
    {
        $this->policy_no = $policy_no;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentTerm(): ?string
    {
        return $this->payment_term;
    }

    /**
     * @param string $payment_term
     * @return PolicyDetailPolicy
     */
    public function setPaymentTerm(?string $payment_term): PolicyDetailPolicy
    {
        $this->payment_term = $payment_term;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsTerm(): ?string
    {
        return $this->ins_term;
    }

    /**
     * @param string $ins_term
     * @return PolicyDetailPolicy
     */
    public function setInsTerm(?string $ins_term): PolicyDetailPolicy
    {
        $this->ins_term = $ins_term;
        return $this;
    }

    /**
     * @return string
     */
    public function getInstallments(): ?string
    {
        return $this->installments;
    }

    /**
     * @param string $installments
     * @return PolicyDetailPolicy
     */
    public function setInstallments(?string $installments): PolicyDetailPolicy
    {
        $this->installments = $installments;
        return $this;
    }

    /**
     * @return string
     */
    public function getAutoModelId(): ?string
    {
        return $this->auto_model_id;
    }

    /**
     * @param string $auto_model_id
     * @return PolicyDetailPolicy
     */
    public function setAutoModelId(?string $auto_model_id): PolicyDetailPolicy
    {
        $this->auto_model_id = $auto_model_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleEngineSize(): ?string
    {
        return $this->vehicle_engine_size;
    }

    /**
     * @param string $vehicle_engine_size
     * @return PolicyDetailPolicy
     */
    public function setVehicleEngineSize(?string $vehicle_engine_size): PolicyDetailPolicy
    {
        $this->vehicle_engine_size = $vehicle_engine_size;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleMfgWarrTerm(): ?string
    {
        return $this->vehicle_mfg_warr_term;
    }

    /**
     * @param string $vehicle_mfg_warr_term
     * @return PolicyDetailPolicy
     */
    public function setVehicleMfgWarrTerm(?string $vehicle_mfg_warr_term): PolicyDetailPolicy
    {
        $this->vehicle_mfg_warr_term = $vehicle_mfg_warr_term;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleMfgWarrKm(): ?string
    {
        return $this->vehicle_mfg_warr_km;
    }

    /**
     * @param string $vehicle_mfg_warr_km
     * @return PolicyDetailPolicy
     */
    public function setVehicleMfgWarrKm(?string $vehicle_mfg_warr_km): PolicyDetailPolicy
    {
        $this->vehicle_mfg_warr_km = $vehicle_mfg_warr_km;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleRegDate(): ?string
    {
        return $this->vehicle_reg_date;
    }

    /**
     * @param string $vehicle_reg_date
     * @return PolicyDetailPolicy
     */
    public function setVehicleRegDate(?string $vehicle_reg_date): PolicyDetailPolicy
    {
        $this->vehicle_reg_date = $vehicle_reg_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleOdometer(): ?string
    {
        return $this->vehicle_odometer;
    }

    /**
     * @param string $vehicle_odometer
     * @return PolicyDetailPolicy
     */
    public function setVehicleOdometer(?string $vehicle_odometer): PolicyDetailPolicy
    {
        $this->vehicle_odometer = $vehicle_odometer;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehiclePurchaseDate(): ?string
    {
        return $this->vehicle_purchase_date;
    }

    /**
     * @param string $vehicle_purchase_date
     * @return PolicyDetailPolicy
     */
    public function setVehiclePurchaseDate(?string $vehicle_purchase_date): PolicyDetailPolicy
    {
        $this->vehicle_purchase_date = $vehicle_purchase_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehiclePurchasePrice(): ?string
    {
        return $this->vehicle_purchase_price;
    }

    /**
     * @param string $vehicle_purchase_price
     * @return PolicyDetailPolicy
     */
    public function setVehiclePurchasePrice(?string $vehicle_purchase_price): PolicyDetailPolicy
    {
        $this->vehicle_purchase_price = $vehicle_purchase_price;
        return $this;
    }

    /**
     * @return string
     */
    public function getVatReclaimable(): ?string
    {
        return $this->vat_reclaimable;
    }

    /**
     * @param string $vat_reclaimable
     * @return PolicyDetailPolicy
     */
    public function setVatReclaimable(?string $vat_reclaimable): PolicyDetailPolicy
    {
        $this->vat_reclaimable = $vat_reclaimable;
        return $this;
    }

    /**
     * @return string
     */
    public function getVatIncluded(): ?string
    {
        return $this->vat_included;
    }

    /**
     * @param string $vat_included
     * @return PolicyDetailPolicy
     */
    public function setVatIncluded(?string $vat_included): PolicyDetailPolicy
    {
        $this->vat_included = $vat_included;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleMfgInception(): ?string
    {
        return $this->vehicle_mfg_inception;
    }

    /**
     * @param string $vehicle_mfg_inception
     * @return PolicyDetailPolicy
     */
    public function setVehicleMfgInception(?string $vehicle_mfg_inception): PolicyDetailPolicy
    {
        $this->vehicle_mfg_inception = $vehicle_mfg_inception;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleVin(): ?string
    {
        return $this->vehicle_vin;
    }

    /**
     * @param string $vehicle_vin
     * @return PolicyDetailPolicy
     */
    public function setVehicleVin(?string $vehicle_vin): PolicyDetailPolicy
    {
        $this->vehicle_vin = $vehicle_vin;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleRegNo(): ?string
    {
        return $this->vehicle_reg_no;
    }

    /**
     * @param string $vehicle_reg_no
     * @return PolicyDetailPolicy
     */
    public function setVehicleRegNo(?string $vehicle_reg_no): PolicyDetailPolicy
    {
        $this->vehicle_reg_no = $vehicle_reg_no;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehiclePrevOwnersNo(): ?string
    {
        return $this->vehicle_prev_owners_no;
    }

    /**
     * @param string $vehicle_prev_owners_no
     * @return PolicyDetailPolicy
     */
    public function setVehiclePrevOwnersNo(?string $vehicle_prev_owners_no): PolicyDetailPolicy
    {
        $this->vehicle_prev_owners_no = $vehicle_prev_owners_no;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicleModelDerivative(): ?string
    {
        return $this->vehicle_model_derivative;
    }

    /**
     * @param string $vehicle_model_derivative
     * @return PolicyDetailPolicy
     */
    public function setVehicleModelDerivative(?string $vehicle_model_derivative): PolicyDetailPolicy
    {
        $this->vehicle_model_derivative = $vehicle_model_derivative;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerType(): ?string
    {
        return $this->customer_type;
    }

    /**
     * @param string $customer_type
     * @return PolicyDetailPolicy
     */
    public function setCustomerType(?string $customer_type): PolicyDetailPolicy
    {
        $this->customer_type = $customer_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerTitleId(): ?string
    {
        return $this->customer_title_id;
    }

    /**
     * @param string $customer_title_id
     * @return PolicyDetailPolicy
     */
    public function setCustomerTitleId(?string $customer_title_id): PolicyDetailPolicy
    {
        $this->customer_title_id = $customer_title_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerFirstName(): ?string
    {
        return $this->customer_first_name;
    }

    /**
     * @param string $customer_first_name
     * @return PolicyDetailPolicy
     */
    public function setCustomerFirstName(?string $customer_first_name): PolicyDetailPolicy
    {
        $this->customer_first_name = $customer_first_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerLastName(): ?string
    {
        return $this->customer_last_name;
    }

    /**
     * @param string $customer_last_name
     * @return PolicyDetailPolicy
     */
    public function setCustomerLastName(?string $customer_last_name): PolicyDetailPolicy
    {
        $this->customer_last_name = $customer_last_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerCompanyName(): ?string
    {
        return $this->customer_company_name;
    }

    /**
     * @param string $customer_company_name
     * @return PolicyDetailPolicy
     */
    public function setCustomerCompanyName(?string $customer_company_name): PolicyDetailPolicy
    {
        $this->customer_company_name = $customer_company_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerIdNo(): ?string
    {
        return $this->customer_id_no;
    }

    /**
     * @param string $customer_id_no
     * @return PolicyDetailPolicy
     */
    public function setCustomerIdNo(?string $customer_id_no): PolicyDetailPolicy
    {
        $this->customer_id_no = $customer_id_no;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerAddress(): ?string
    {
        return $this->customer_address;
    }

    /**
     * @param string $customer_address
     * @return PolicyDetailPolicy
     */
    public function setCustomerAddress(?string $customer_address): PolicyDetailPolicy
    {
        $this->customer_address = $customer_address;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerAddress2(): ?string
    {
        return $this->customer_address2;
    }

    /**
     * @param string $customer_address2
     * @return PolicyDetailPolicy
     */
    public function setCustomerAddress2(?string $customer_address2): PolicyDetailPolicy
    {
        $this->customer_address2 = $customer_address2;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerCity(): ?string
    {
        return $this->customer_city;
    }

    /**
     * @param string $customer_city
     * @return PolicyDetailPolicy
     */
    public function setCustomerCity(?string $customer_city): PolicyDetailPolicy
    {
        $this->customer_city = $customer_city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerPostCode(): ?string
    {
        return $this->customer_post_code;
    }

    /**
     * @param string $customer_post_code
     * @return PolicyDetailPolicy
     */
    public function setCustomerPostCode(?string $customer_post_code): PolicyDetailPolicy
    {
        $this->customer_post_code = $customer_post_code;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerTel(): ?string
    {
        return $this->customer_tel;
    }

    /**
     * @param string $customer_tel
     * @return PolicyDetailPolicy
     */
    public function setCustomerTel(?string $customer_tel): PolicyDetailPolicy
    {
        $this->customer_tel = $customer_tel;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerEmail(): ?string
    {
        return $this->customer_email;
    }

    /**
     * @param string $customer_email
     * @return PolicyDetailPolicy
     */
    public function setCustomerEmail(?string $customer_email): PolicyDetailPolicy
    {
        $this->customer_email = $customer_email;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerHadClaims(): ?string
    {
        return $this->customer_had_claims;
    }

    /**
     * @param string $customer_had_claims
     * @return PolicyDetailPolicy
     */
    public function setCustomerHadClaims(?string $customer_had_claims): PolicyDetailPolicy
    {
        $this->customer_had_claims = $customer_had_claims;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsuredIsCoverholder(): ?string
    {
        return $this->insured_is_coverholder;
    }

    /**
     * @param string $insured_is_coverholder
     * @return PolicyDetailPolicy
     */
    public function setInsuredIsCoverholder(?string $insured_is_coverholder): PolicyDetailPolicy
    {
        $this->insured_is_coverholder = $insured_is_coverholder;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsuredType(): ?string
    {
        return $this->insured_type;
    }

    /**
     * @param string $insured_type
     * @return PolicyDetailPolicy
     */
    public function setInsuredType(?string $insured_type): PolicyDetailPolicy
    {
        $this->insured_type = $insured_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsuredTitleId(): ?string
    {
        return $this->insured_title_id;
    }

    /**
     * @param string $insured_title_id
     * @return PolicyDetailPolicy
     */
    public function setInsuredTitleId(?string $insured_title_id): PolicyDetailPolicy
    {
        $this->insured_title_id = $insured_title_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsuredFirstName(): ?string
    {
        return $this->insured_first_name;
    }

    /**
     * @param string $insured_first_name
     * @return PolicyDetailPolicy
     */
    public function setInsuredFirstName(?string $insured_first_name): PolicyDetailPolicy
    {
        $this->insured_first_name = $insured_first_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsuredLastName(): ?string
    {
        return $this->insured_last_name;
    }

    /**
     * @param string $insured_last_name
     * @return PolicyDetailPolicy
     */
    public function setInsuredLastName(?string $insured_last_name): PolicyDetailPolicy
    {
        $this->insured_last_name = $insured_last_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsuredCompanyName(): ?string
    {
        return $this->insured_company_name;
    }

    /**
     * @param string $insured_company_name
     * @return PolicyDetailPolicy
     */
    public function setInsuredCompanyName(?string $insured_company_name): PolicyDetailPolicy
    {
        $this->insured_company_name = $insured_company_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsuredIdNo(): ?string
    {
        return $this->insured_id_no;
    }

    /**
     * @param string $insured_id_no
     * @return PolicyDetailPolicy
     */
    public function setInsuredIdNo(?string $insured_id_no): PolicyDetailPolicy
    {
        $this->insured_id_no = $insured_id_no;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsuredAddress(): ?string
    {
        return $this->insured_address;
    }

    /**
     * @param string $insured_address
     * @return PolicyDetailPolicy
     */
    public function setInsuredAddress(?string $insured_address): PolicyDetailPolicy
    {
        $this->insured_address = $insured_address;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsuredAddress2(): ?string
    {
        return $this->insured_address2;
    }

    /**
     * @param string $insured_address2
     * @return PolicyDetailPolicy
     */
    public function setInsuredAddress2(?string $insured_address2): PolicyDetailPolicy
    {
        $this->insured_address2 = $insured_address2;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsuredCity(): ?string
    {
        return $this->insured_city;
    }

    /**
     * @param string $insured_city
     * @return PolicyDetailPolicy
     */
    public function setInsuredCity(?string $insured_city): PolicyDetailPolicy
    {
        $this->insured_city = $insured_city;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsuredPostCode(): ?string
    {
        return $this->insured_post_code;
    }

    /**
     * @param string $insured_post_code
     * @return PolicyDetailPolicy
     */
    public function setInsuredPostCode(?string $insured_post_code): PolicyDetailPolicy
    {
        $this->insured_post_code = $insured_post_code;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsuredTel(): ?string
    {
        return $this->insured_tel;
    }

    /**
     * @param string $insured_tel
     * @return PolicyDetailPolicy
     */
    public function setInsuredTel(?string $insured_tel): PolicyDetailPolicy
    {
        $this->insured_tel = $insured_tel;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsuredEmail(): ?string
    {
        return $this->insured_email;
    }

    /**
     * @param string $insured_email
     * @return PolicyDetailPolicy
     */
    public function setInsuredEmail(?string $insured_email): PolicyDetailPolicy
    {
        $this->insured_email = $insured_email;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeneficiaryIsCoverholder(): ?string
    {
        return $this->beneficiary_is_coverholder;
    }

    /**
     * @param string $beneficiary_is_coverholder
     * @return PolicyDetailPolicy
     */
    public function setBeneficiaryIsCoverholder(?string $beneficiary_is_coverholder): PolicyDetailPolicy
    {
        $this->beneficiary_is_coverholder = $beneficiary_is_coverholder;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeneficiaryIsInsured(): ?string
    {
        return $this->beneficiary_is_insured;
    }

    /**
     * @param string $beneficiary_is_insured
     * @return PolicyDetailPolicy
     */
    public function setBeneficiaryIsInsured(?string $beneficiary_is_insured): PolicyDetailPolicy
    {
        $this->beneficiary_is_insured = $beneficiary_is_insured;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeneficiaryType(): ?string
    {
        return $this->beneficiary_type;
    }

    /**
     * @param string $beneficiary_type
     * @return PolicyDetailPolicy
     */
    public function setBeneficiaryType(?string $beneficiary_type): PolicyDetailPolicy
    {
        $this->beneficiary_type = $beneficiary_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeneficiaryTitleId(): ?string
    {
        return $this->beneficiary_title_id;
    }

    /**
     * @param string $beneficiary_title_id
     * @return PolicyDetailPolicy
     */
    public function setBeneficiaryTitleId(?string $beneficiary_title_id): PolicyDetailPolicy
    {
        $this->beneficiary_title_id = $beneficiary_title_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeneficiaryFirstName(): ?string
    {
        return $this->beneficiary_first_name;
    }

    /**
     * @param string $beneficiary_first_name
     * @return PolicyDetailPolicy
     */
    public function setBeneficiaryFirstName(?string $beneficiary_first_name): PolicyDetailPolicy
    {
        $this->beneficiary_first_name = $beneficiary_first_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeneficiaryLastName(): ?string
    {
        return $this->beneficiary_last_name;
    }

    /**
     * @param string $beneficiary_last_name
     * @return PolicyDetailPolicy
     */
    public function setBeneficiaryLastName(?string $beneficiary_last_name): PolicyDetailPolicy
    {
        $this->beneficiary_last_name = $beneficiary_last_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeneficiaryCompanyName(): ?string
    {
        return $this->beneficiary_company_name;
    }

    /**
     * @param string $beneficiary_company_name
     * @return PolicyDetailPolicy
     */
    public function setBeneficiaryCompanyName(?string $beneficiary_company_name): PolicyDetailPolicy
    {
        $this->beneficiary_company_name = $beneficiary_company_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeneficiaryIdNo(): ?string
    {
        return $this->beneficiary_id_no;
    }

    /**
     * @param string $beneficiary_id_no
     * @return PolicyDetailPolicy
     */
    public function setBeneficiaryIdNo(?string $beneficiary_id_no): PolicyDetailPolicy
    {
        $this->beneficiary_id_no = $beneficiary_id_no;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeneficiaryAddress(): ?string
    {
        return $this->beneficiary_address;
    }

    /**
     * @param string $beneficiary_address
     * @return PolicyDetailPolicy
     */
    public function setBeneficiaryAddress(?string $beneficiary_address): PolicyDetailPolicy
    {
        $this->beneficiary_address = $beneficiary_address;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeneficiaryAddress2(): ?string
    {
        return $this->beneficiary_address2;
    }

    /**
     * @param string $beneficiary_address2
     * @return PolicyDetailPolicy
     */
    public function setBeneficiaryAddress2(?string $beneficiary_address2): PolicyDetailPolicy
    {
        $this->beneficiary_address2 = $beneficiary_address2;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeneficiaryCity(): ?string
    {
        return $this->beneficiary_city;
    }

    /**
     * @param string $beneficiary_city
     * @return PolicyDetailPolicy
     */
    public function setBeneficiaryCity(?string $beneficiary_city): PolicyDetailPolicy
    {
        $this->beneficiary_city = $beneficiary_city;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeneficiaryPostCode(): ?string
    {
        return $this->beneficiary_post_code;
    }

    /**
     * @param string $beneficiary_post_code
     * @return PolicyDetailPolicy
     */
    public function setBeneficiaryPostCode(?string $beneficiary_post_code): PolicyDetailPolicy
    {
        $this->beneficiary_post_code = $beneficiary_post_code;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeneficiaryTel(): ?string
    {
        return $this->beneficiary_tel;
    }

    /**
     * @param string $beneficiary_tel
     * @return PolicyDetailPolicy
     */
    public function setBeneficiaryTel(?string $beneficiary_tel): PolicyDetailPolicy
    {
        $this->beneficiary_tel = $beneficiary_tel;
        return $this;
    }

    /**
     * @return string
     */
    public function getBeneficiaryEmail(): ?string
    {
        return $this->beneficiary_email;
    }

    /**
     * @param string $beneficiary_email
     * @return PolicyDetailPolicy
     */
    public function setBeneficiaryEmail(?string $beneficiary_email): PolicyDetailPolicy
    {
        $this->beneficiary_email = $beneficiary_email;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerIsCoverholder(): ?string
    {
        return $this->owner_is_coverholder;
    }

    /**
     * @param string $owner_is_coverholder
     * @return PolicyDetailPolicy
     */
    public function setOwnerIsCoverholder(?string $owner_is_coverholder): PolicyDetailPolicy
    {
        $this->owner_is_coverholder = $owner_is_coverholder;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerType(): ?string
    {
        return $this->owner_type;
    }

    /**
     * @param string $owner_type
     * @return PolicyDetailPolicy
     */
    public function setOwnerType(?string $owner_type): PolicyDetailPolicy
    {
        $this->owner_type = $owner_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerTitleId(): ?string
    {
        return $this->owner_title_id;
    }

    /**
     * @param string $owner_title_id
     * @return PolicyDetailPolicy
     */
    public function setOwnerTitleId(?string $owner_title_id): PolicyDetailPolicy
    {
        $this->owner_title_id = $owner_title_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerFirstName(): ?string
    {
        return $this->owner_first_name;
    }

    /**
     * @param string $owner_first_name
     * @return PolicyDetailPolicy
     */
    public function setOwnerFirstName(?string $owner_first_name): PolicyDetailPolicy
    {
        $this->owner_first_name = $owner_first_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerLastName(): ?string
    {
        return $this->owner_last_name;
    }

    /**
     * @param string $owner_last_name
     * @return PolicyDetailPolicy
     */
    public function setOwnerLastName(?string $owner_last_name): PolicyDetailPolicy
    {
        $this->owner_last_name = $owner_last_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerCompanyName(): ?string
    {
        return $this->owner_company_name;
    }

    /**
     * @param string $owner_company_name
     * @return PolicyDetailPolicy
     */
    public function setOwnerCompanyName(?string $owner_company_name): PolicyDetailPolicy
    {
        $this->owner_company_name = $owner_company_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerIdNo(): ?string
    {
        return $this->owner_id_no;
    }

    /**
     * @param string $owner_id_no
     * @return PolicyDetailPolicy
     */
    public function setOwnerIdNo(?string $owner_id_no): PolicyDetailPolicy
    {
        $this->owner_id_no = $owner_id_no;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerAddress(): ?string
    {
        return $this->owner_address;
    }

    /**
     * @param string $owner_address
     * @return PolicyDetailPolicy
     */
    public function setOwnerAddress(?string $owner_address): PolicyDetailPolicy
    {
        $this->owner_address = $owner_address;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerAddress2(): ?string
    {
        return $this->owner_address2;
    }

    /**
     * @param string $owner_address2
     * @return PolicyDetailPolicy
     */
    public function setOwnerAddress2(?string $owner_address2): PolicyDetailPolicy
    {
        $this->owner_address2 = $owner_address2;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerCity(): ?string
    {
        return $this->owner_city;
    }

    /**
     * @param string $owner_city
     * @return PolicyDetailPolicy
     */
    public function setOwnerCity(?string $owner_city): PolicyDetailPolicy
    {
        $this->owner_city = $owner_city;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerPostCode(): ?string
    {
        return $this->owner_post_code;
    }

    /**
     * @param string $owner_post_code
     * @return PolicyDetailPolicy
     */
    public function setOwnerPostCode(?string $owner_post_code): PolicyDetailPolicy
    {
        $this->owner_post_code = $owner_post_code;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerTel(): ?string
    {
        return $this->owner_tel;
    }

    /**
     * @param string $owner_tel
     * @return PolicyDetailPolicy
     */
    public function setOwnerTel(?string $owner_tel): PolicyDetailPolicy
    {
        $this->owner_tel = $owner_tel;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerEmail(): ?string
    {
        return $this->owner_email;
    }

    /**
     * @param string $owner_email
     * @return PolicyDetailPolicy
     */
    public function setOwnerEmail(?string $owner_email): PolicyDetailPolicy
    {
        $this->owner_email = $owner_email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPolicyInceptionDate(): ?string
    {
        return $this->policy_inception_date;
    }

    /**
     * @param string $policy_inception_date
     * @return PolicyDetailPolicy
     */
    public function setPolicyInceptionDate(?string $policy_inception_date): PolicyDetailPolicy
    {
        $this->policy_inception_date = $policy_inception_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getPolicyExpiryDate(): ?string
    {
        return $this->policy_expiry_date;
    }

    /**
     * @param string $policy_expiry_date
     * @return PolicyDetailPolicy
     */
    public function setPolicyExpiryDate(?string $policy_expiry_date): PolicyDetailPolicy
    {
        $this->policy_expiry_date = $policy_expiry_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return PolicyDetailPolicy
     */
    public function setNotes(?string $notes): PolicyDetailPolicy
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductId(): ?string
    {
        return $this->product_id;
    }

    /**
     * @return string|null
     */
    public function getStatusLockedOn(): ?string
    {
        return $this->status_locked_on;
    }

    /**
     * @param string|null $status_locked_on
     * @return PolicyDetailPolicy
     */
    public function setStatusLockedOn(?string $status_locked_on): PolicyDetailPolicy
    {
        $this->status_locked_on = $status_locked_on;
        return $this;
    }

    /**
     * @param string $product_id
     * @return PolicyDetailPolicy
     */
    public function setProductId(?string $product_id): PolicyDetailPolicy
    {
        $this->product_id = $product_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusOpenedOn(): ?string
    {
        return $this->status_opened_on;
    }

    /**
     * @param string $status_opened_on
     * @return PolicyDetailPolicy
     */
    public function setStatusOpenedOn(?string $status_opened_on): PolicyDetailPolicy
    {
        $this->status_opened_on = $status_opened_on;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusCertifiedOn(): ?string
    {
        return $this->status_certified_on;
    }

    /**
     * @param string $status_certified_on
     * @return PolicyDetailPolicy
     */
    public function setStatusCertifiedOn(?string $status_certified_on): PolicyDetailPolicy
    {
        $this->status_certified_on = $status_certified_on;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusPaidOn(): ?string
    {
        return $this->status_paid_on;
    }

    /**
     * @param string $status_paid_on
     * @return PolicyDetailPolicy
     */
    public function setStatusPaidOn(?string $status_paid_on): PolicyDetailPolicy
    {
        $this->status_paid_on = $status_paid_on;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusCanceledOn(): ?string
    {
        return $this->status_canceled_on;
    }

    /**
     * @param string $status_canceled_on
     * @return PolicyDetailPolicy
     */
    public function setStatusCanceledOn(?string $status_canceled_on): PolicyDetailPolicy
    {
        $this->status_canceled_on = $status_canceled_on;
        return $this;
    }

    /**
     * @return string
     */
    public function getCancellationReason(): ?string
    {
        return $this->cancellation_reason;
    }

    /**
     * @param string $cancellation_reason
     * @return PolicyDetailPolicy
     */
    public function setCancellationReason(?string $cancellation_reason): PolicyDetailPolicy
    {
        $this->cancellation_reason = $cancellation_reason;
        return $this;
    }

    /**
     * @return string
     */
    public function getCancellationRefund(): ?string
    {
        return $this->cancellation_refund;
    }

    /**
     * @param string $cancellation_refund
     * @return PolicyDetailPolicy
     */
    public function setCancellationRefund(?string $cancellation_refund): PolicyDetailPolicy
    {
        $this->cancellation_refund = $cancellation_refund;
        return $this;
    }

    /**
     * @return string
     */
    public function getPremium(): ?string
    {
        return $this->premium;
    }

    /**
     * @param string $premium
     * @return PolicyDetailPolicy
     */
    public function setPremium(?string $premium): PolicyDetailPolicy
    {
        $this->premium = $premium;
        return $this;
    }

    /**
     * @return string
     */
    public function getRefundPaidTo(): ?string
    {
        return $this->refund_paid_to;
    }

    /**
     * @param string $refund_paid_to
     * @return PolicyDetailPolicy
     */
    public function setRefundPaidTo(?string $refund_paid_to): PolicyDetailPolicy
    {
        $this->refund_paid_to = $refund_paid_to;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorizationCodeVerified(): ?string
    {
        return $this->authorization_code_verified;
    }

    /**
     * @param string $authorization_code_verified
     * @return PolicyDetailPolicy
     */
    public function setAuthorizationCodeVerified(?string $authorization_code_verified): PolicyDetailPolicy
    {
        $this->authorization_code_verified = $authorization_code_verified;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * @param string $created
     * @return PolicyDetailPolicy
     */
    public function setCreated(?string $created): PolicyDetailPolicy
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return string
     */
    public function getCoverageId(): ?string
    {
        return $this->coverage_id;
    }

    /**
     * @param string $coverage_id
     * @return PolicyDetailPolicy
     */
    public function setCoverageId(?string $coverage_id): PolicyDetailPolicy
    {
        $this->coverage_id = $coverage_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCoverageName(): ?string
    {
        return $this->coverage_name;
    }

    /**
     * @param string $coverage_name
     * @return PolicyDetailPolicy
     */
    public function setCoverageName(?string $coverage_name): PolicyDetailPolicy
    {
        $this->coverage_name = $coverage_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntModelId(): ?string
    {
        return $this->int_model_id;
    }

    /**
     * @param string $int_model_id
     * @return PolicyDetailPolicy
     */
    public function setIntModelId(?string $int_model_id): PolicyDetailPolicy
    {
        $this->int_model_id = $int_model_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): ?string
    {
        return $this->payment_method;
    }

    /**
     * @param string $payment_method
     * @return PolicyDetailPolicy
     */
    public function setPaymentMethod(?string $payment_method): PolicyDetailPolicy
    {
        $this->payment_method = $payment_method;
        return $this;
    }

    /**
     * @return string
     */
    public function getClaimLimit(): ?string
    {
        return $this->claim_limit;
    }

    /**
     * @param string|null $claim_limit
     * @return PolicyDetailPolicy
     */
    public function setClaimLimit(?string $claim_limit): PolicyDetailPolicy
    {
        $this->claim_limit = $claim_limit;
        return $this;
    }

}
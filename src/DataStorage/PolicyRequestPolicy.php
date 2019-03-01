<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 14:19
 */

namespace IDefendApi\DataStorage;


use IDefendApi\Exception\ApiReplyExcetion;

class PolicyRequestPolicy extends CoveragePolicy
{

    public $vehicle_vin;
    public $vehicle_reg_no;
    public $vehicle_prev_owners_no;
    public $payment_method;
    public $policy_inception_date;
    public $customer_type;
    public $customer_title_id;
    public $customer_first_name;
    public $customer_last_name;
    public $customer_company_name;
    public $customer_id_no;
    public $customer_address;
    public $customer_address2;
    public $customer_city;
    public $customer_post_code;
    public $customer_tel;
    public $customer_email;
    public $customer_had_claims;
    public $insured_is_coverholder;
    public $insured_type;
    public $insured_title_id;
    public $insured_first_name;
    public $insured_last_name;
    public $insured_company_name;
    public $insured_id_no;
    public $insured_address;
    public $insured_address2;
    public $insured_city;
    public $insured_post_code;
    public $insured_tel;
    public $insured_email;
    public $beneficiary_is_coverholder;
    public $beneficiary_is_insured;
    public $beneficiary_type;
    public $beneficiary_title_id;
    public $beneficiary_first_name;
    public $beneficiary_last_name;
    public $beneficiary_company_name;
    public $beneficiary_id_no;
    public $beneficiary_address;
    public $beneficiary_address2;
    public $beneficiary_city;
    public $beneficiary_post_code;
    public $beneficiary_tel;
    public $beneficiary_email;
    public $owner_is_coverholder;
    public $owner_type;
    public $owner_title_id;
    public $owner_first_name;
    public $owner_last_name;
    public $owner_company_name;
    public $owner_id_no;
    public $owner_address;
    public $owner_address2;
    public $owner_city;
    public $owner_post_code;
    public $owner_tel;
    public $owner_email;
    public $notes;

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


    public static function importFromCoverageGroup(CoverageGroup $coverageGroup)
    {
        $policyRequest = new PolicyRequest();

        $policyRequest->Policy = $policyRequestPolicy = new PolicyRequestPolicy();
        foreach ($coverageGroup->Policy as $key => $item) {
            $policyRequestPolicy->{$key} = $item;
        }

        foreach ($coverageGroup->Loading as $key => $item) {
            if ($item->selected == 'true') {
                $policyRequest->Loading[] = clone $item;
            }

        }

        foreach ($coverageGroup->Extra as $key => $item) {
            if ($item->selected == 'true') {
                $policyRequest->Extra[] = clone $item;
            }

        }

        foreach ($coverageGroup->Coverage as $key => $item) {
            if ($item->selected == 'true') {
                $policyRequest->Coverage[] = clone $item;
            }

        }


        return $policyRequest;
    }

    /**
     * @return mixed
     */
    public function getVehicleVin()
    {
        return $this->vehicle_vin;
    }

    /**
     * @param mixed $vehicle_vin
     * @return PolicyRequestPolicy
     */
    public function setVehicleVin($vehicle_vin)
    {
        $this->vehicle_vin = $vehicle_vin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVehicleRegNo()
    {
        return $this->vehicle_reg_no;
    }

    /**
     * @param mixed $vehicle_reg_no
     * @return PolicyRequestPolicy
     */
    public function setVehicleRegNo($vehicle_reg_no)
    {
        $this->vehicle_reg_no = $vehicle_reg_no;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVehiclePrevOwnersNo()
    {
        return $this->vehicle_prev_owners_no;
    }

    /**
     * @param mixed $vehicle_prev_owners_no
     * @return PolicyRequestPolicy
     */
    public function setVehiclePrevOwnersNo($vehicle_prev_owners_no)
    {
        $this->vehicle_prev_owners_no = $vehicle_prev_owners_no;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    /**
     * @param mixed $payment_method
     * @return PolicyRequestPolicy
     */
    public function setPaymentMethod($payment_method)
    {
        $this->payment_method = $payment_method;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPolicyInceptionDate()
    {
        return $this->policy_inception_date;
    }

    /**
     * @param mixed $policy_inception_date
     * @return PolicyRequestPolicy
     */
    public function setPolicyInceptionDate($policy_inception_date)
    {
        $this->policy_inception_date = $policy_inception_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerType()
    {
        return $this->customer_type;
    }

    /**
     * @param mixed $customer_type
     * @return PolicyRequestPolicy
     */
    public function setCustomerType($customer_type)
    {
        $this->customer_type = $customer_type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerTitleId()
    {
        return $this->customer_title_id;
    }

    /**
     * @param mixed $customer_title_id
     * @return PolicyRequestPolicy
     */
    public function setCustomerTitleId($customer_title_id)
    {
        $this->customer_title_id = $customer_title_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerFirstName()
    {
        return $this->customer_first_name;
    }

    /**
     * @param mixed $customer_first_name
     * @return PolicyRequestPolicy
     */
    public function setCustomerFirstName($customer_first_name)
    {
        $this->customer_first_name = $customer_first_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerLastName()
    {
        return $this->customer_last_name;
    }

    /**
     * @param mixed $customer_last_name
     * @return PolicyRequestPolicy
     */
    public function setCustomerLastName($customer_last_name)
    {
        $this->customer_last_name = $customer_last_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerCompanyName()
    {
        return $this->customer_company_name;
    }

    /**
     * @param mixed $customer_company_name
     * @return PolicyRequestPolicy
     */
    public function setCustomerCompanyName($customer_company_name)
    {
        $this->customer_company_name = $customer_company_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerIdNo()
    {
        return $this->customer_id_no;
    }

    /**
     * @param mixed $customer_id_no
     * @return PolicyRequestPolicy
     */
    public function setCustomerIdNo($customer_id_no)
    {
        $this->customer_id_no = $customer_id_no;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerAddress()
    {
        return $this->customer_address;
    }

    /**
     * @param mixed $customer_address
     * @return PolicyRequestPolicy
     */
    public function setCustomerAddress($customer_address)
    {
        $this->customer_address = $customer_address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerAddress2()
    {
        return $this->customer_address2;
    }

    /**
     * @param mixed $customer_address2
     * @return PolicyRequestPolicy
     */
    public function setCustomerAddress2($customer_address2)
    {
        $this->customer_address2 = $customer_address2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerCity()
    {
        return $this->customer_city;
    }

    /**
     * @param mixed $customer_city
     * @return PolicyRequestPolicy
     */
    public function setCustomerCity($customer_city)
    {
        $this->customer_city = $customer_city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerPostCode()
    {
        return $this->customer_post_code;
    }

    /**
     * @param mixed $customer_post_code
     * @return PolicyRequestPolicy
     */
    public function setCustomerPostCode($customer_post_code)
    {
        $this->customer_post_code = $customer_post_code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerTel()
    {
        return $this->customer_tel;
    }

    /**
     * @param mixed $customer_tel
     * @return PolicyRequestPolicy
     */
    public function setCustomerTel($customer_tel)
    {
        $this->customer_tel = $customer_tel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerEmail()
    {
        return $this->customer_email;
    }

    /**
     * @param mixed $customer_email
     * @return PolicyRequestPolicy
     */
    public function setCustomerEmail($customer_email)
    {
        $this->customer_email = $customer_email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerHadClaims()
    {
        return $this->customer_had_claims;
    }

    /**
     * @param mixed $customer_had_claims
     * @return PolicyRequestPolicy
     */
    public function setCustomerHadClaims($customer_had_claims)
    {
        $this->customer_had_claims = $customer_had_claims;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsuredIsCoverholder()
    {
        return $this->insured_is_coverholder;
    }

    /**
     * @param mixed $insured_is_coverholder
     * @return PolicyRequestPolicy
     */
    public function setInsuredIsCoverholder($insured_is_coverholder)
    {
        $this->insured_is_coverholder = $insured_is_coverholder;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsuredType()
    {
        return $this->insured_type;
    }

    /**
     * @param mixed $insured_type
     * @return PolicyRequestPolicy
     */
    public function setInsuredType($insured_type)
    {
        $this->insured_type = $insured_type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsuredTitleId()
    {
        return $this->insured_title_id;
    }

    /**
     * @param mixed $insured_title_id
     * @return PolicyRequestPolicy
     */
    public function setInsuredTitleId($insured_title_id)
    {
        $this->insured_title_id = $insured_title_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsuredFirstName()
    {
        return $this->insured_first_name;
    }

    /**
     * @param mixed $insured_first_name
     * @return PolicyRequestPolicy
     */
    public function setInsuredFirstName($insured_first_name)
    {
        $this->insured_first_name = $insured_first_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsuredLastName()
    {
        return $this->insured_last_name;
    }

    /**
     * @param mixed $insured_last_name
     * @return PolicyRequestPolicy
     */
    public function setInsuredLastName($insured_last_name)
    {
        $this->insured_last_name = $insured_last_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsuredCompanyName()
    {
        return $this->insured_company_name;
    }

    /**
     * @param mixed $insured_company_name
     * @return PolicyRequestPolicy
     */
    public function setInsuredCompanyName($insured_company_name)
    {
        $this->insured_company_name = $insured_company_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsuredIdNo()
    {
        return $this->insured_id_no;
    }

    /**
     * @param mixed $insured_id_no
     * @return PolicyRequestPolicy
     */
    public function setInsuredIdNo($insured_id_no)
    {
        $this->insured_id_no = $insured_id_no;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsuredAddress()
    {
        return $this->insured_address;
    }

    /**
     * @param mixed $insured_address
     * @return PolicyRequestPolicy
     */
    public function setInsuredAddress($insured_address)
    {
        $this->insured_address = $insured_address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsuredAddress2()
    {
        return $this->insured_address2;
    }

    /**
     * @param mixed $insured_address2
     * @return PolicyRequestPolicy
     */
    public function setInsuredAddress2($insured_address2)
    {
        $this->insured_address2 = $insured_address2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsuredCity()
    {
        return $this->insured_city;
    }

    /**
     * @param mixed $insured_city
     * @return PolicyRequestPolicy
     */
    public function setInsuredCity($insured_city)
    {
        $this->insured_city = $insured_city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsuredPostCode()
    {
        return $this->insured_post_code;
    }

    /**
     * @param mixed $insured_post_code
     * @return PolicyRequestPolicy
     */
    public function setInsuredPostCode($insured_post_code)
    {
        $this->insured_post_code = $insured_post_code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsuredTel()
    {
        return $this->insured_tel;
    }

    /**
     * @param mixed $insured_tel
     * @return PolicyRequestPolicy
     */
    public function setInsuredTel($insured_tel)
    {
        $this->insured_tel = $insured_tel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsuredEmail()
    {
        return $this->insured_email;
    }

    /**
     * @param mixed $insured_email
     * @return PolicyRequestPolicy
     */
    public function setInsuredEmail($insured_email)
    {
        $this->insured_email = $insured_email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryIsCoverholder()
    {
        return $this->beneficiary_is_coverholder;
    }

    /**
     * @param mixed $beneficiary_is_coverholder
     * @return PolicyRequestPolicy
     */
    public function setBeneficiaryIsCoverholder($beneficiary_is_coverholder)
    {
        $this->beneficiary_is_coverholder = $beneficiary_is_coverholder;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryIsInsured()
    {
        return $this->beneficiary_is_insured;
    }

    /**
     * @param mixed $beneficiary_is_insured
     * @return PolicyRequestPolicy
     */
    public function setBeneficiaryIsInsured($beneficiary_is_insured)
    {
        $this->beneficiary_is_insured = $beneficiary_is_insured;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryType()
    {
        return $this->beneficiary_type;
    }

    /**
     * @param mixed $beneficiary_type
     * @return PolicyRequestPolicy
     */
    public function setBeneficiaryType($beneficiary_type)
    {
        $this->beneficiary_type = $beneficiary_type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryTitleId()
    {
        return $this->beneficiary_title_id;
    }

    /**
     * @param mixed $beneficiary_title_id
     * @return PolicyRequestPolicy
     */
    public function setBeneficiaryTitleId($beneficiary_title_id)
    {
        $this->beneficiary_title_id = $beneficiary_title_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryFirstName()
    {
        return $this->beneficiary_first_name;
    }

    /**
     * @param mixed $beneficiary_first_name
     * @return PolicyRequestPolicy
     */
    public function setBeneficiaryFirstName($beneficiary_first_name)
    {
        $this->beneficiary_first_name = $beneficiary_first_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryLastName()
    {
        return $this->beneficiary_last_name;
    }

    /**
     * @param mixed $beneficiary_last_name
     * @return PolicyRequestPolicy
     */
    public function setBeneficiaryLastName($beneficiary_last_name)
    {
        $this->beneficiary_last_name = $beneficiary_last_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryCompanyName()
    {
        return $this->beneficiary_company_name;
    }

    /**
     * @param mixed $beneficiary_company_name
     * @return PolicyRequestPolicy
     */
    public function setBeneficiaryCompanyName($beneficiary_company_name)
    {
        $this->beneficiary_company_name = $beneficiary_company_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryIdNo()
    {
        return $this->beneficiary_id_no;
    }

    /**
     * @param mixed $beneficiary_id_no
     * @return PolicyRequestPolicy
     */
    public function setBeneficiaryIdNo($beneficiary_id_no)
    {
        $this->beneficiary_id_no = $beneficiary_id_no;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryAddress()
    {
        return $this->beneficiary_address;
    }

    /**
     * @param mixed $beneficiary_address
     * @return PolicyRequestPolicy
     */
    public function setBeneficiaryAddress($beneficiary_address)
    {
        $this->beneficiary_address = $beneficiary_address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryAddress2()
    {
        return $this->beneficiary_address2;
    }

    /**
     * @param mixed $beneficiary_address2
     * @return PolicyRequestPolicy
     */
    public function setBeneficiaryAddress2($beneficiary_address2)
    {
        $this->beneficiary_address2 = $beneficiary_address2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryCity()
    {
        return $this->beneficiary_city;
    }

    /**
     * @param mixed $beneficiary_city
     * @return PolicyRequestPolicy
     */
    public function setBeneficiaryCity($beneficiary_city)
    {
        $this->beneficiary_city = $beneficiary_city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryPostCode()
    {
        return $this->beneficiary_post_code;
    }

    /**
     * @param mixed $beneficiary_post_code
     * @return PolicyRequestPolicy
     */
    public function setBeneficiaryPostCode($beneficiary_post_code)
    {
        $this->beneficiary_post_code = $beneficiary_post_code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryTel()
    {
        return $this->beneficiary_tel;
    }

    /**
     * @param mixed $beneficiary_tel
     * @return PolicyRequestPolicy
     */
    public function setBeneficiaryTel($beneficiary_tel)
    {
        $this->beneficiary_tel = $beneficiary_tel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryEmail()
    {
        return $this->beneficiary_email;
    }

    /**
     * @param mixed $beneficiary_email
     * @return PolicyRequestPolicy
     */
    public function setBeneficiaryEmail($beneficiary_email)
    {
        $this->beneficiary_email = $beneficiary_email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerIsCoverholder()
    {
        return $this->owner_is_coverholder;
    }

    /**
     * @param mixed $owner_is_coverholder
     * @return PolicyRequestPolicy
     */
    public function setOwnerIsCoverholder($owner_is_coverholder)
    {
        $this->owner_is_coverholder = $owner_is_coverholder;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerType()
    {
        return $this->owner_type;
    }

    /**
     * @param mixed $owner_type
     * @return PolicyRequestPolicy
     */
    public function setOwnerType($owner_type)
    {
        $this->owner_type = $owner_type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerTitleId()
    {
        return $this->owner_title_id;
    }

    /**
     * @param mixed $owner_title_id
     * @return PolicyRequestPolicy
     */
    public function setOwnerTitleId($owner_title_id)
    {
        $this->owner_title_id = $owner_title_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerFirstName()
    {
        return $this->owner_first_name;
    }

    /**
     * @param mixed $owner_first_name
     * @return PolicyRequestPolicy
     */
    public function setOwnerFirstName($owner_first_name)
    {
        $this->owner_first_name = $owner_first_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerLastName()
    {
        return $this->owner_last_name;
    }

    /**
     * @param mixed $owner_last_name
     * @return PolicyRequestPolicy
     */
    public function setOwnerLastName($owner_last_name)
    {
        $this->owner_last_name = $owner_last_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerCompanyName()
    {
        return $this->owner_company_name;
    }

    /**
     * @param mixed $owner_company_name
     * @return PolicyRequestPolicy
     */
    public function setOwnerCompanyName($owner_company_name)
    {
        $this->owner_company_name = $owner_company_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerIdNo()
    {
        return $this->owner_id_no;
    }

    /**
     * @param mixed $owner_id_no
     * @return PolicyRequestPolicy
     */
    public function setOwnerIdNo($owner_id_no)
    {
        $this->owner_id_no = $owner_id_no;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerAddress()
    {
        return $this->owner_address;
    }

    /**
     * @param mixed $owner_address
     * @return PolicyRequestPolicy
     */
    public function setOwnerAddress($owner_address)
    {
        $this->owner_address = $owner_address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerAddress2()
    {
        return $this->owner_address2;
    }

    /**
     * @param mixed $owner_address2
     * @return PolicyRequestPolicy
     */
    public function setOwnerAddress2($owner_address2)
    {
        $this->owner_address2 = $owner_address2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerCity()
    {
        return $this->owner_city;
    }

    /**
     * @param mixed $owner_city
     * @return PolicyRequestPolicy
     */
    public function setOwnerCity($owner_city)
    {
        $this->owner_city = $owner_city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerPostCode()
    {
        return $this->owner_post_code;
    }

    /**
     * @param mixed $owner_post_code
     * @return PolicyRequestPolicy
     */
    public function setOwnerPostCode($owner_post_code)
    {
        $this->owner_post_code = $owner_post_code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerTel()
    {
        return $this->owner_tel;
    }

    /**
     * @param mixed $owner_tel
     * @return PolicyRequestPolicy
     */
    public function setOwnerTel($owner_tel)
    {
        $this->owner_tel = $owner_tel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwnerEmail()
    {
        return $this->owner_email;
    }

    /**
     * @param mixed $owner_email
     * @return PolicyRequestPolicy
     */
    public function setOwnerEmail($owner_email)
    {
        $this->owner_email = $owner_email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     * @return PolicyRequestPolicy
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

}
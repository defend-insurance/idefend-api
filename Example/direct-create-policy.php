<?php
require_once "__head.php";

$api = \IDefendApi\Service\IDefendApi::createDev(USERNAME, PASSWORD);


?>
    <h1>Direct Create Policy</h1>

    <h3>1. Call</h3>
    <pre>
    $coverageRequest3->selectCoverage(POLICY_COVERAGE_ID,POLICY_COVERAGE_PREMIUM);


    $policyRequest=\IDefendApi\DataStorage\PolicyRequestPolicy::importFromCoverageGroup($coverageRequest3);

    $policyRequest->Policy->setVehicleVin("999".date("YmdHis"));
    $policyRequest->Policy->setVehiclePrevOwnersNo(1);
    $policyRequest->Policy->setVehicleRegNo("XXX-XX-XX");

    $policyRequest->Policy->setCustomerTel(POLICY_CONTACT_PHONE);
    $policyRequest->Policy->setCustomerEmail(POLICY_CONTACT_EMAIL);
    $policyRequest->Policy->setCustomerIdNo('1234567891');
    $policyRequest->Policy->setCustomerType("BUSINESS");
    $policyRequest->Policy->setCustomerCompanyName("Company");
    $policyRequest->Policy->setCustomerAddress("Address");
    $policyRequest->Policy->setCustomerPostCode("99999");
    $policyRequest->Policy->setCustomerCity("City");


    $policyRequest->Policy->setInsuredCompanyName("Insurer Name");
    $policyRequest->Policy->setInsuredAddress("Insurer Address");
    $policyRequest->Policy->setInsuredCity("Insurer City");
    $policyRequest->Policy->setInsuredPostCode("88888");
    $policyRequest->Policy->setInsuredTel("+000-123456789");
    $policyRequest->Policy->setInsuredEmail("insurer@email.eu");
    $policyRequest->Policy->setInsuredIdNo("555555555555");
    $policyRequest->Policy->setInsuredType("BUSINESS");
    $policyRequest->Policy->setPaymentMethod("BANK_TRANSFER");



$result=$api->savePolicy($policyRequest);
</pre>
    <h3>Result</h3>
<?
$coverageRequest = new \IDefendApi\DataStorage\CoverageGroup();
$coverageRequest->setPolicy($policy = new \IDefendApi\DataStorage\CoveragePolicy());

$policy->setProductId(PRODUCTID);
$policy->setIntModelId(MODELID);
$policy->setVehicleModelDerivative("Standard");
$policy->setVehicleRegDate(date("Y-m-d", time() - 4 * 365 * 24 * 3600));
$policy->setVehiclePurchaseDate(date("Y-m-d"));
$policy->setVehiclePurchasePrice(PPRICE);
$policy->setVehicleMfgInception(date("Y-m-d", time() - 4 * 365 * 24 * 3600));
$policy->setVehicleMfgWarrTerm(PMANUFACTURERWARRANTYTERM);
$policy->setVehicleMfgWarrKm(PMANUFACTURERWARRANTYKM);
$policy->setVehicleOdometer(PWEHICLEODOMETER);
$policy->setVehicleEngineSize(PWEHICLEENGINESIZE);
$policy->setPaymentTerm(PPAYMENTTERM);
$policy->setInsTerm(PINSTERM);
$policy->setVatIncluded(1);
$policy->setVatReclaimable(0);
$policy->setClaimLimit(PCLAIMLIMIT);
try {
    $coverageRequest2 = $api->getCoverages($coverageRequest);
} catch (\IDefendApi\Exception\ApiReplyExcetion $e) {
    echo $e->getMessage();;
    require "__foot.php";
    exit;
}

foreach (PLOADINGCHANGE as $type => $id) {
    $coverageRequest2->selectLoading($type, $id);
}
foreach (PEXTRACHANGE as $id => $selected) {
    $coverageRequest2->changeExtra($id, $selected);
}

$coverageRequest3 = $api->getCoverages($coverageRequest2);

$coverageRequest3->selectCoverage(POLICY_COVERAGE_ID);


$policyRequest = \IDefendApi\DataStorage\PolicyRequestPolicy::importFromCoverageGroup($coverageRequest3);

$policyRequest->setPremium(POLICY_COVERAGE_PREMIUM);

$policyRequest->Policy->setVehicleVin("999" . date("YmdHis"));
$policyRequest->Policy->setVehiclePrevOwnersNo(1);
$policyRequest->Policy->setVehicleRegNo("XXX-XX-XX");

$policyRequest->Policy->setCustomerTel(POLICY_CONTACT_PHONE);
$policyRequest->Policy->setCustomerEmail(POLICY_CONTACT_EMAIL);
$policyRequest->Policy->setCustomerIdNo('1234567891');
$policyRequest->Policy->setCustomerType("BUSINESS");
$policyRequest->Policy->setCustomerCompanyName("Company");
$policyRequest->Policy->setCustomerAddress("Address");
$policyRequest->Policy->setCustomerPostCode("99999");
$policyRequest->Policy->setCustomerCity("City");


$policyRequest->Policy->setInsuredCompanyName("Insurer Name");
$policyRequest->Policy->setInsuredAddress("Insurer Address");
$policyRequest->Policy->setInsuredCity("Insurer City");
$policyRequest->Policy->setInsuredPostCode("88888");
$policyRequest->Policy->setInsuredTel("+000-123456789");
$policyRequest->Policy->setInsuredEmail("insurer@email.eu");
$policyRequest->Policy->setInsuredIdNo("555555555555");
$policyRequest->Policy->setInsuredType("BUSINESS");
$policyRequest->Policy->setPaymentMethod("BANK_TRANSFER");

$policyRequest->Policy->setOwnerIsCoverholder('true');


$result = $api->savePolicy($policyRequest);

?>
    <div class="btn-group" role="group" aria-label="Actions">
        <a name="detail" id="detail" class="btn btn-success"
           href="get-policy.php?policy_no=<?= $result->Policy->policy_no ?>"
           role="button">Detail</a>
    </div>
<?

var_dump($result);


require_once "__foot.php";
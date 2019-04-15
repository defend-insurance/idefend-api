<?php
require_once "__head.php";

$api = \IDefendApi\Service\IDefendApi::createDev(USERNAME, PASSWORD);


?>
    <h1>Coverage Counting</h1>

    <h3>1. Call</h3>
    <pre>
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

    $coverageRequest2 = $api->getCoverages($coverageRequest);
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
try
{
    $coverageRequest2 = $api->getCoverages($coverageRequest);
}
catch (\IDefendApi\Exception\ApiReplyExcetion $e){
    echo $e->getMessage();;
    require "__foot.php";
    exit;


}
var_dump($coverageRequest2);
?>

    <h3>2. Modify Loadings and Extras and recal</h3>
    <pre>
foreach (PLOADINGCHANGE as $type=>$id)
{
    $coverageRequest2->selectLoading($type,$id);
}
foreach (PEXTRACHANGE as $id=>$selected) {
    $coverageRequest2->changeExtra($id,$selected);
}

    $coverageRequest3=$api->getCoverages($coverageRequest2);
</pre>
    <h3>Result</h3>

<?php
foreach (PLOADINGCHANGE as $type => $id) {
    $coverageRequest2->selectLoading($type, $id);
}
foreach (PEXTRACHANGE as $id => $selected) {
    $coverageRequest2->changeExtra($id, $selected);
}


$coverageRequest3 = $api->getCoverages($coverageRequest2);
var_dump($coverageRequest3);
?>


<?
require_once "__foot.php";
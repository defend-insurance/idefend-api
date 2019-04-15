<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 25.02.2019
 * Time: 14:53
 */
require_once __DIR__ . "/../vendor/autoload.php";
error_reporting(E_ALL);
const LOGIN = 'jindra.test';
const PASSWORD = 'dig2019';

$api = \IDefendApi\Service\IDefendApi::createDev(LOGIN, PASSWORD);

$user = $api->login();
echo "<h1>Login</h1>";
var_dump($user);



echo "<h1>Products</h1>";
$product = $api->getProducts();
var_dump($product);

echo "<h1>Makers</h1>";
$makers = $api->getMakes("SKO");
var_dump($makers);

echo "<h1>Models</h1>";

$models = $api->getModels("VOLVO", 2, "V");
var_dump($models);

echo "<h1>Get Model by Id</h1>";


$model = $api->getModelById(597);
var_dump($model);

echo "<h1>Get Coverages</h1>";

$coverage = new \IDefendApi\DataStorage\CoverageGroup();

$coverage->setPolicy($policy = new \IDefendApi\DataStorage\CoveragePolicy());

$policy->setProductId(4);
$policy->setIntModelId(2);
$policy->setVehicleModelDerivative("civic");
$policy->setVehicleRegDate(date("Y-m-d", time() - 4 * 365 * 24 * 3600));
$policy->setVehiclePurchaseDate(date("Y-m-d"));
$policy->setVehiclePurchasePrice(100000);
$policy->setVehicleMfgInception(date("Y-m-d", time() - 4 * 365 * 24 * 3600));
$policy->setVehicleMfgWarrTerm(12);
$policy->setVehicleMfgWarrKm(3000);
$policy->setVehicleOdometer(25000);
$policy->setVehicleEngineSize(1996);
$policy->setPaymentTerm("LumpSum");
$policy->setInsTerm(12);
$policy->setVatIncluded(1);
$policy->setVatReclaimable(0);

$model = $api->getCoverages($coverage);

$model->changeExtra('17','true');

var_dump($model);
$model=$api->getCoverages($model);
echo "<h1>Modified</h1>";

$model->selectCoverage(14,6000);
var_dump($model);

echo "<h1>New Policy Request</h1>";

$policyRequest=\IDefendApi\DataStorage\PolicyRequestPolicy::importFromCoverageGroup($model);

$policyRequest->Policy->setVehicleVin("12345678901234566");
$policyRequest->Policy->setVehiclePrevOwnersNo(1);
$policyRequest->Policy->setVehicleRegNo("456-45-12");

$policyRequest->Policy->setCustomerTel("+420-608041706");
$policyRequest->Policy->setCustomerEmail("michal.tupy@defendinsurance.eu");
$policyRequest->Policy->setCustomerIdNo('1234567891');
$policyRequest->Policy->setCustomerType("BUSINESS");
$policyRequest->Policy->setCustomerCompanyName("Company");
$policyRequest->Policy->setCustomerAddress("Address");
$policyRequest->Policy->setCustomerPostCode("76701");
$policyRequest->Policy->setCustomerCity("Kromeriz");


$policyRequest->Policy->setInsuredCompanyName("Insurer Name");
$policyRequest->Policy->setInsuredAddress("IA");
$policyRequest->Policy->setInsuredCity("ICity");
$policyRequest->Policy->setInsuredPostCode("78945");
$policyRequest->Policy->setInsuredTel("+420-608041706");
$policyRequest->Policy->setInsuredEmail("michal.tupy@defendinsurance.eu");
$policyRequest->Policy->setInsuredIdNo("555555555555");
$policyRequest->Policy->setInsuredType("BUSINESS");

$policyRequest->Policy->setPaymentMethod("BANK_TRANSFER");
$result=$api->savePolicy($policyRequest);

var_dump($result);




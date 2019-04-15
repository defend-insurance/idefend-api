<?php
require_once "__head.php";

$api = \IDefendApi\Service\IDefendApi::createDev(USERNAME, PASSWORD);


?>
    <h1>Get Claim Limits</h1>
    <p>Defined for GAP with claim limits, primary in Poland</p>

    <h3>Call</h3>

    $result=$api->getClaimLimits();
    <h3>Result</h3>
<?
$result = $api->getClaimLimits();
var_dump($result);
?>

<?
require_once "__foot.php";
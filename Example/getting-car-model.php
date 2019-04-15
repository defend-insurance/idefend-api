<?php
require_once "__head.php";

$api = \IDefendApi\Service\IDefendApi::createDev(USERNAME, PASSWORD);


?>
    <h1>Getting Car Model</h1>
    <h2>Get Makes</h2>

    <h3>Call</h3>

    $result=$api->getMakes(MAKEPREFIX);
    <h3>Result</h3>
<?
$result = $api->getMakes(MAKEPREFIX);
var_dump($result);
?>
    <h2>Get Model</h2>

    <h3>Call</h3>

    $result=$api->getMakes(MAKELABEL,PRODUCTID,MODELPREFIX);
    <h3>Result</h3>
<?
$result = $api->getModels(MAKELABEL,PRODUCTID,MODELPREFIX);
var_dump($result);
?>

    <h2>Get Model by ID</h2>

    <h3>Call</h3>

    $result=$api->getModelById(MODELID);
    <h3>Result</h3>
<?
$result = $api->getModelById(MODELID);
var_dump($result);
?>
<?
require_once "__foot.php";
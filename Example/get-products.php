<?php
require_once "__head.php";

$api = \IDefendApi\Service\IDefendApi::createDev(USERNAME, PASSWORD);


?>
    <h1>Get Products</h1>

    <h3>Call</h3>

    $result=$api->getProducts();
    <h3>Result</h3>
<?
$result = $api->getProducts();
var_dump($result);
?>

<?
require_once "__foot.php";
<?php
require_once "__head.php";

$api = \IDefendApi\Service\IDefendApi::createDev(USERNAME, PASSWORD);


?>
    <h1>Start Stop Session</h1>

    <p>Dont forget set testing username and Password</p>

    <h2>Init Api</h2>
    $api = \IDefendApi\Service\IDefendApi::createDev(USERNAME, PASSWORD);

    <h2>Start session</h2>

    <h3>Call</h3>

    $result=$api->login();
    <h3>Result</h3>
    <?
    $result=$api->login();
    var_dump($result);
    ?>

    <h2>Close session</h2>

    <h3>Call</h3>
     $result=$api->logout();
    <h3>Result</h3>
    <?
    $result=$api->logout();
    var_dump($result);
    ?>
</pre>
<?
require_once "__foot.php";
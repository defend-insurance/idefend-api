<?php
require_once "constants.php";

try {
    $api = \IDefendApi\Service\IDefendApi::createDev(USERNAME, PASSWORD);

    $policyNo = Helper::getPolicyNO();

    $policyDetail = $api->getPolicy($policyNo);

    Helper::outputFile($api->get($policyDetail));
}
catch (Exception $e)
{
    require_once "__head.php";

    Helper::showMessage(Helper::DANGER,$e->getMessage());

    require_once "__foot.php";
}
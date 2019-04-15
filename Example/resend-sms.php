<?php
require_once "__head.php";

$api = Helper::getApi();
$policyNo = Helper::getPolicyNO();

?>
    <h1>Resend SMS <?= $policyNo ?></h1>
    <div class="btn-group" role="group" aria-label="Actions">
        <a name="detail" id="detail" class="btn btn-success" href="get-policy.php?policy_no=<?= $policyNo ?>"
           role="button">Detail</a>
    </div>
    <h3>Call</h3>

    <pre>
        $policyDetail = $api->getPolicy($policyNo);
        if ($policyDetail->isSignable()) {
            $resut = $api->resendSms($policyDetail);
        }
    </pre>
    <h3>Result</h3>
<?
$policyDetail = $api->getPolicy($policyNo);


if ($policyDetail->isSignable()) {
    $result = $api->resendSms($policyDetail);
    if ($result) {
        Helper::showMessage(Helper::SUCCESS, "Sended");
    }

} else {
    Helper::showMessage(Helper::DANGER, "Policy is not signable");
}

var_dump($result);
?>

<?
require_once "__foot.php";
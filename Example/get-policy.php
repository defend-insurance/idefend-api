<?php
require_once "__head.php";

$api = \IDefendApi\Service\IDefendApi::createDev(USERNAME, PASSWORD);


?>
    <h1>Get Policy <?= $policyId ?></h1>

    <h3>Call</h3>

    <pre>
        $result = $api->getPolicy($policyNo);
    </pre>
    <h3>Result</h3>

<?
$policyNo = Helper::getPolicyNO();


$result = $api->getPolicy($policyNo);

?>
    <div class="btn-group" role="group" aria-label="Actions">
        <?
        if ($result->isSignable()) {
            echo '<a name="resend" id="resend-sms" class="btn btn-warning" href="resend-sms.php?policy_no=' . $policyNo . '" role="button">Resend SMS</a>';
            echo '<a name="sign" id="sign" class="btn btn-primary" href="sign-policy.php?policy_no=' . $policyNo . '" role="button">Sign</a>';
        }
        if ($result->isCancelable()) {
            echo '<a name="cancel" id="cancel" class="btn btn-danger" href="cancel-policy.php?policy_no=' . $policyNo . '" role="button">Cancel Policy</a>';

        }

        ?>
        <a target="_blank" name="quote" id="quote" class="btn btn-success" href="quote.php?policy_no=<?= $policyNo ?>"
           role="button">Print quote</a>
        <?
        if (!$result->isQuote()) {
            ?>
            <a target="_blank" name="precontract" id="precontract" class="btn btn-success"
               href="precontract.php?policy_no=<?= $policyNo ?>" role="button">Print precontract</a>
            <a target="_blank" name="contract" id="contract" class="btn btn-success"
               href="contract.php?policy_no=<?= $policyNo ?>" role="button">Print contract</a>
            <?
        }
        else{
            ?>
            <a target="_blank" name="precontract" id="precontract" class="btn btn-primary"
               href="modify-quote.php?policy_no=<?= $policyNo ?>" role="button">Modify Quote</a>
           <?
        }
        ?>
    </div>
<?
var_dump($result);
require_once "__foot.php";
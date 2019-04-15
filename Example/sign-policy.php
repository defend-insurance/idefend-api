<?php
require_once "__head.php";

$api = Helper::getApi();
$policyNo = Helper::getPolicyNO();


?>
    <h1>Sign <?= $policyNo ?></h1>
    <div class="btn-group" role="group" aria-label="Actions">
        <a name="detail" id="detail" class="btn btn-success" href="get-policy.php?policy_no=<?= $policyNo ?>"
           role="button">Detail</a>
    </div>

    <div class="container">
        <form>
            <div class="form-group row">
                <label for="signCode" class="col-sm-3 col-form-label">Policy NO</label>
                <div class="col-sm-3">
                    <input type="text" readonly class="form-control-plaintext" name="policy_no" id="signCode"
                           placeholder="" value="<?= $policyNo ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="signCode" class="col-sm-3 col-form-label">Sign code</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="sign_code" id="signCode" placeholder=""
                           value="<?= $signCode = Helper::getValue('sign_code') ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

    <h3>Call</h3>

    <pre>
        $policy = $api->getPolicy($policyNo);
        $api->sign($policy, $signCode);
    </pre>
    <h3>Result</h3>
<?
if ($signCode) {
    try {

        $policy = $api->getPolicy($policyNo);
        $api->sign($policy, $signCode);
        Helper::showMessage(Helper::SUCCESS, "Signed");

    } catch (Exception $e) {
        Helper::showMessage(Helper::DANGER, $e->getMessage());
    }
}
?>

<?
require_once "__foot.php";
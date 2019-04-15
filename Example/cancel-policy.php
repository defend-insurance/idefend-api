<?php
require_once "__head.php";

$api = Helper::getApi();
$policyNo = Helper::getPolicyNO();

$cancelationLists = $api->getCancellationCodificators();

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
                <label for="cancelation-reason" class="col-sm-3 col-form-label">Cancelation Reason</label>
                <div class="col-sm-3">
                    <?= Helper::getSelect('cancelation-reason', $cancelationLists->cancellation_reason,
                       $cancelationReason = Helper::getValue('cancelation-reason')) ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="cancelation-refund" class="col-sm-3 col-form-label">Cancelation Refund</label>
                <div class="col-sm-3">
                    <?= Helper::getSelect('cancelation-refund', $cancelationLists->cancellation_refund,
                       $cancelationRefund = Helper::getValue('cancelation-refund'), 'cancelation-refund') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="refund-paid-to" class="col-sm-3 col-form-label">Refund Paid To</label>
                <div class="col-sm-3">
                    <?= Helper::getSelect('refund-paid-to', $cancelationLists->refund_paid_to,
                       $refundPaidTo = Helper::getValue('refund-paid-to'), 'refund-paid-to') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="notes" class="col-sm-3 col-form-label">Notes</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="notes" id="signCode" placeholder=""
                           value="<?= $notes = Helper::getValue('notes') ?>">
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
if ($cancelationReason) {
    try {

        $policyDetail = $api->getPolicy($policyNo);
        $api->cancelPolicy($policyDetail, $cancelationReason, $cancelationRefund, $refundPaidTo, $notes);
        Helper::showMessage(Helper::SUCCESS, "Canceled");

    } catch (Exception $e) {
        Helper::showMessage(Helper::DANGER, $e->getMessage());
    }
}
?>

<?
require_once "__foot.php";
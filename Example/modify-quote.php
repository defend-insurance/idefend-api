<?php
require_once "__head.php";

$api = \IDefendApi\Service\IDefendApi::createDev(USERNAME, PASSWORD);

$policyNo = Helper::getPolicyNO();
?>
    <h1>Modify Quote <?= $policyNo ?></h1>
    <div class="btn-group" role="group" aria-label="Actions">
        <a name="detail" id="detail" class="btn btn-success" href="get-policy.php?policy_no=<?= $policyNo ?>"
           role="button">Detail</a>
    </div>
    <h3>Call</h3>

    <pre>
        $result = $api->getPolicy($policyNo);
    </pre>
    <h3>Policy</h3>
<?


$result = $api->getPolicy($policyNo);
$policyRequest = $api->getPolicyRequestFromPolicy($result, null, null);


$readonly = array("id", "policy_no", "product_id")


?>
    <div class="container">
        <form>
            <?
            foreach (\IDefendApi\DataStorage\PolicyRequestPolicy::getReflection() as $field) {

                if (in_array($field, $readonly)) {
                    ?>
                    <div class="form-group row">
                        <label for="<?= $field ?>" class="col-sm-3 col-form-label"><?= $field ?></label>
                        <div class="col-sm-3">
                            <input type="text" readonly class="form-control-plaintext" name="<?= $field ?>"
                                   id="signCode"
                                   placeholder="" value="<?= $policyRequest->Policy->{$field} ?>">
                        </div>
                    </div>
                    <?

                } else {
                    ?>
                    <div class="form-group row">
                        <label for="<?= $field ?>" class="col-sm-3 col-form-label"><?= $field ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="<?= $field ?>" id="<?= $field ?>"
                                   placeholder=""
                                   value="<?= $policyRequest->Policy->{$field} = Helper::getValue($field,
                                      $policyRequest->Policy->{$field}) ?>">
                        </div>
                    </div>
                    <?
                }
            }

            ?>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit
                    </button>
                </div>
            </div>

            <h3>Loadings</h3>
            <?

            $loadings = [];
            foreach ($policyRequest->Loading as $loading) {
                $loadings[$loading->type]['fields'][]=\IDefendApi\DataStorage\ListItem::__fromArray(array("id"=>$loading->id,"name"=>$loading->value));
                if ($loading->selected == 'true') {
                    $loadings[$loading->type]['selected'] = $loading->id;
                }
            }
            var_dump($policyRequest->Loading);
            foreach ($loadings as $type => $loading) {
                ?>
                <div class="form-group row">
                    <label for="<?= $field ?>" class="col-sm-3 col-form-label"><?= $type ?></label>
                    <div class="col-sm-3">
                        <?= Helper::getSelect("Loading-" . $type, $loading['fields'],
                           Helper::getValue("Loading-" . $type, $loading['selected'])); ?>
                    </div>
                </div>
                <?

            }


            ?>
        </form>
    </div>
<?
var_dump($policyRequest);


var_dump($result);
require_once "__foot.php";
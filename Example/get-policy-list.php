<?php
require_once "__head.php";

$api = \IDefendApi\Service\IDefendApi::createDev(USERNAME, PASSWORD);


?>
    <h1>Get PolicyList</h1>

    <h3>Call</h3>

    <pre>

    $conditions=array();
    $conditions[]=\IDefendApi\DataStorage\PolicyListCondition::createConditionItem("id",\IDefendApi\DataStorage\PolicyListCondition::CO_GT,0);
    $conditions[]=$or=new \IDefendApi\DataStorage\PolicyListConditionOr();
    $or->add(\IDefendApi\DataStorage\PolicyListCondition::createConditionItem('policy_no',\IDefendApi\DataStorage\PolicyListCondition::CO_LIKE,"C%"));
    $or->add(\IDefendApi\DataStorage\PolicyListCondition::createConditionItem('policy_no',\IDefendApi\DataStorage\PolicyListCondition::CO_EQ,"CG"));

    $result = $api->getPolicyList($conditions,1,10,['id','policy_no']);
    </pre>
    <h3>Result</h3>
<?
$conditions = array();
$conditions[] = \IDefendApi\DataStorage\PolicyListCondition::createConditionItem("id",
   \IDefendApi\DataStorage\PolicyListCondition::CO_GT, 0);
$conditions[] = $or = new \IDefendApi\DataStorage\PolicyListConditionOr();
$or->add(\IDefendApi\DataStorage\PolicyListCondition::createConditionItem('policy_no',
   \IDefendApi\DataStorage\PolicyListCondition::CO_LIKE, "C%"));
$or->add(\IDefendApi\DataStorage\PolicyListCondition::createConditionItem('policy_no',
   \IDefendApi\DataStorage\PolicyListCondition::CO_EQ, "CG"));


$result = $api->getPolicyList($conditions, 1, 10, ['id', 'policy_no']);
echo "Paging:";
var_dump($result->getPaging());
?>
    Policies:
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>Id</th>
            <th>No</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($result->Policies as $policy) {
            echo "<tr><td><a href='get-policy.php?policy_no=" . $policy->policy_no . "' class='btn btn-success'>Show</a></td><td>" . $policy->id . "</td><td>" . $policy->policy_no . "</td></tr>";
        }
        ?>
        </tbody>
    </table>


<?
require_once "__foot.php";
<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 24.02.2019
 * Time: 19:31
 */

namespace IDefendApi\Service;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use http\Exception\UnexpectedValueException;
use IDefendApi\DataStorage\CancellationCodificators;
use IDefendApi\DataStorage\Coverage;
use IDefendApi\DataStorage\CoverageGroup;
use IDefendApi\DataStorage\CoveragePolicy;
use IDefendApi\DataStorage\Extra;
use IDefendApi\DataStorage\File;
use IDefendApi\DataStorage\Loading;
use IDefendApi\DataStorage\LoggedUser;
use IDefendApi\DataStorage\MagicFigure;
use IDefendApi\DataStorage\Maker;
use IDefendApi\DataStorage\Model;
use IDefendApi\DataStorage\PolicyDetail;
use IDefendApi\DataStorage\PolicyDetailPolicy;
use IDefendApi\DataStorage\PolicyListResult;
use IDefendApi\DataStorage\PolicyRequest;
use IDefendApi\DataStorage\PolicyRequestPolicy;
use IDefendApi\DataStorage\Product;
use IDefendApi\Exception\ApiReplyExcetion;
use IDefendApi\Exception\UnallowedOperationExcetion;
use Psr\Http\Message\ResponseInterface;

class IDefendApi
{
    const DevUrl = "https://test.idefend.eu";
    const LiveUrl = "https://www.idefend.eu";

    /** @var string */
    private $login = '';
    /** @var string */
    private $password = '';
    /** @var Client */
    private $client;
    /** @var LoggedUser */
    private $logged = null;

    /** @var ResponseInterface|null */
    private $lastResult;


    static function createDev($login, $password)
    {
        return new self(new Client(['base_uri' => static::DevUrl, 'cookies' => true]), $login, $password);
    }

    static function createLive($login, $password)
    {
        return new self(new Client(['base_uri' => static::LiveUrl, 'cookies' => true]), $login, $password);
    }

    public function __construct(Client $client, $login, $password)
    {
        $this->client = $client;
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @param Response $response
     * @return mixed
     * @throws ApiReplyExcetion
     * @throws UnexpectedValueException
     */
    private static function checkData(Response $response)
    {
        $result = json_decode($rawResult = $response->getBody()->getContents(), true);
        if (isset($result['data']['error'])) {
            throw new ApiReplyExcetion(is_array($result['data']['error']) ? json_encode($result['data']['error']) : $result['data']['error'],
               isset($result['data']['code']) ? $result['data']['code'] : "0");
        }
        if (isset($result['data'])) {
            return $result['data'];
        }
        throw new \UnexpectedValueException($rawResult);
    }

    /**
     * @param Response $response
     * @param $fileName
     * @return File
     * @throws ApiReplyExcetion
     */
    private static function checkFile(Response $response, $fileName)
    {
        if (($response->getHeader("Content-Type")[0] ?? null) == "application/pdf") {
            return new File($result = $response->getBody()->getContents(), "application/pdf", $fileName);
        }
        $result = json_decode($rawResult = $response->getBody()->getContents(), true);
        if (isset($result['data']['error'])) {
            throw new ApiReplyExcetion(is_array($result['data']['error']) ? json_encode($result['data']['error']) : $result['data']['error'],
               isset($result['data']['code']) ? $result['data']['code'] : "0");
        }
        throw new \UnexpectedValueException($rawResult);
    }

    /**
     * @return LoggedUser
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    private function startSession()
    {
        $this->lastResult = $this->client->request('POST', '/ws/user/startSession',
           ['json' => ['User' => ['username' => $this->login, 'password' => $this->password]]]);


        $data = self::checkData($this->lastResult);
        if (isset($data['User'])) {
            $this->logged = LoggedUser::__fromArray($data['User']);
            return $this->logged;
        }
        throw new UnexpectedValueException(json_encode($data));
    }


    /**
     * @return LoggedUser
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function login()
    {
        if ($this->logged) {
            return $this->logged;
        }
        return $this->startSession();
    }

    /**
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function closeSession()
    {
        if ($this->logged) {
            $this->lastResult = $this->client->request('GET', '/ws/user/closeSession');
            $this->logged = null;
            return true;
        } else {
            return false;
        }
    }


    /**
     * @return array|Product[]
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function getProducts()
    {
        $this->login();
        $this->lastResult = $this->client->request('POST', '/ws/user/getProducts');
        $data = self::checkData($this->lastResult);
        $result = array();
        if ($data['Product']) {

            foreach ($data['Product'] as $itemData) {
                $result[] = Product::__fromArray($itemData);
            }
        }
        return $result;

    }

    /**
     * @param $labelPrefix
     * @return array|Maker[]
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function getMakes($labelPrefix)
    {
        $this->login();
        $this->lastResult = $this->client->request('POST', '/ws/policy/getMakes', ['json' => ["make" => $labelPrefix]]);
        $data = self::checkData($this->lastResult);
        $result = array();
        if ($data['Makes']) {

            foreach ($data['Makes'] as $itemData) {
                $result[] = Maker::__fromArray($itemData);
            }
        }
        return $result;

    }

    /**
     * @param $makerLabel
     * @param $productId
     * @param $modelPrefix
     * @return array|Model[]
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function getModels($makerLabel, $productId, $modelPrefix)
    {
        $this->login();
        $this->lastResult = $this->client->request('POST', '/ws/policy/getModels',
           ['json' => ["make" => $makerLabel, "product_id" => $productId, "model" => $modelPrefix]]);
        $data = self::checkData($this->lastResult);
        $result = array();
        if ($data['Models']) {

            foreach ($data['Models'] as $itemData) {
                $result[] = Model::__fromArray($itemData);
            }
        }
        return $result;
    }


    /**
     * @param $modelId
     * @return array|Model[]
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function getModelById($modelId)
    {
        $this->login();
        $this->lastResult = $this->client->request('POST', '/ws/policy/getModelById',
           ['json' => ["model_id" => $modelId]]);
        $data = self::checkData($this->lastResult);
        $result = array();
        if ($data['Model']) {

            $result = Model::__fromArray([
               "id" => $data['Model']["model_id"],
               "label" => $data['Model']["model"],
               "make" => [
                  "id" => $data['Model']["make_id"],
                  "label" => $data['Model']["make"]
               ]
            ]);

        }
        return $result;
    }

    /**
     * @param CoverageGroup $coverage
     * @return CoverageGroup|mixed
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function getCoverages(CoverageGroup $coverage)
    {
        $this->login();
        $data = $coverage;
        $this->lastResult = $this->client->request('POST', '/ws/policy/getCoverages',
           ['json' => $data]);
        $data = self::checkData($this->lastResult);
        $coverage = CoverageGroup::__fromArray($data);
        return $coverage;
    }

    /**
     * @param PolicyRequest $policyRequest
     * @return \IDefendApi\DataStorage\DataStorage|PolicyDetail
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function savePolicy(PolicyRequest $policyRequest)
    {
        $this->login();
        $this->lastResult = $this->client->request('POST', '/ws/policy/savePolicy',
           ['json' => $policyRequest]);
        $data = self::checkData($this->lastResult);
        $policy = PolicyDetail::__fromArray($data);
        return $policy;
    }

    /**
     * @param string $policyNo
     * @return \IDefendApi\DataStorage\DataStorage|PolicyDetail
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function getPolicy(string $policyNo)
    {
        $this->login();
        $this->lastResult = $this->client->request('POST', '/ws/policy/getPolicy',
           ['json' => ["policy_no" => $policyNo]]);
        $data = self::checkData($this->lastResult);

        $policy = PolicyDetail::__fromArray($data);
        return $policy;
    }

    /**
     * @param PolicyDetail $policyDetail
     * @return bool
     * @throws ApiReplyExcetion
     * @throws UnallowedOperationExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function resendSms(PolicyDetail $policyDetail)
    {
        if (!$policyDetail->isSignable()) {
            throw new UnallowedOperationExcetion("Policy is not signable");
        }
        $this->login();
        $this->lastResult = $this->client->request('POST', '/ws/policy/resendSms',
           ['json' => ["policy_no" => $policyDetail->Policy->policy_no]]);
        $data = self::checkData($this->lastResult);
        return $data['success'];
    }

    /**
     * @param PolicyDetail $policyDetail
     * @param string $code
     * @return bool
     * @throws ApiReplyExcetion
     * @throws UnallowedOperationExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function sign(PolicyDetail $policyDetail, string $code)
    {
        if (!$policyDetail->isSignable()) {
            throw new UnallowedOperationExcetion("Policy is not signable");
        }
        $this->login();
        $this->lastResult = $this->client->request('POST', '/ws/policy/sign',
           ['json' => ["policy_no" => $policyDetail->Policy->policy_no, "auth_code" => $code]]);
        self::checkData($this->lastResult);
        return true;
    }


    /**
     * @return string[]
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function getClaimLimits()
    {
        $this->login();
        $this->lastResult = $this->client->request('POST', '/ws/policy/getClaimLimits', array());
        $data = self::checkData($this->lastResult);
        return $data["ClaimLimits"];

    }

    /**
     * @param $conditions
     * @param int $page
     * @param int $limit
     * @param array $fields
     * @return \IDefendApi\DataStorage\DataStorage|PolicyListResult
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function getPolicyList($conditions, $page = 1, $limit = 10, $fields = array())
    {

        foreach ($fields as $fieldName) {
            if (!PolicyDetailPolicy::checkField($fieldName)) {
                throw new  \UnexpectedValueException("Invalid Policy Detail Field: " . $fieldName);
            }
        }

        $this->login();
        $request = [
           "json" => [
              "limit" => $limit,
              "page" => $page,
              "fields" => $fields,
              "conditions" => $conditions
           ]
        ];

        $this->lastResult = $this->client->request("POST", "/ws/policy/getPolicyList", $request);
        $data = self::checkData($this->lastResult);
        return PolicyListResult::__fromArray($data);
    }

    /**
     * @param PolicyDetail $policyDetail
     * @return File
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function getQuote(PolicyDetail $policyDetail)
    {
        $this->login();

        $this->lastResult = $this->client->request("POST", "/ws/policy/getQuote",
           ['json' => ['policy_no' => $policyDetail->Policy->policy_no]]);

        return self::checkFile($this->lastResult, $policyDetail->Policy->policy_no . "-quote.pdf");
    }

    /**
     * @param PolicyDetail $policyDetail
     * @return File
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function getProposal(PolicyDetail $policyDetail)
    {
        $this->login();

        $this->lastResult = $this->client->request("POST", "/ws/policy/getProposal",
           ['json' => ['policy_no' => $policyDetail->Policy->policy_no]]);

        return self::checkFile($this->lastResult, $policyDetail->Policy->policy_no . "-proposal.pdf");
    }

    /**
     * @param PolicyDetail $policyDetail
     * @return File
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function getContract(PolicyDetail $policyDetail)
    {
        $this->login();

        $this->lastResult = $this->client->request("POST", "/ws/policy/getContract",
           ['json' => ['policy_no' => $policyDetail->Policy->policy_no]]);

        return self::checkFile($this->lastResult, $policyDetail->Policy->policy_no . "-contract.pdf");
    }


    public function cancelPolicy(
       PolicyDetail $policyDetail,
       $cancelationReason,
       $cancelationRefund = '100% refund',
       $refundPaidTo = "dealer",
       $notes = ""
    ) {
        $this->login();
        $request = [
           'policy_no' => $policyDetail->Policy->policy_no,
           'cancellation_reason' => $cancelationReason,
           'cancellation_refund' => $cancelationRefund,
           'refund_paid_to' => $refundPaidTo,
           'notes' => $notes
        ];
        $this->lastResult = $this->client->request("POST", "/ws/policy/cancelPolicy",
           [
              'json' => $request
           ]);
        self::checkData($this->lastResult);

        return true;


    }


    public function getCancellationCodificators()
    {
        $this->login();

        $this->lastResult = $this->client->request("GET", "/ws/policy/getCancellationCodificators", []);
        $data = self::checkData($this->lastResult);

        return CancellationCodificators::__fromArray($data);

    }


    public function saveQuote(PolicyRequest $policyRequest)
    {
        $this->login();

        $policyRequestData=json_decode(json_encode($policyRequest),true);

        $this->lastResult = $this->client->request('POST', '/ws/policy/saveQuote',
           ['json' => $policyRequestData]);
        $data = self::checkData($this->lastResult);
        $policy = PolicyDetail::__fromArray($data);
        return $policy;
    }

    /**
     * @param PolicyDetail $policyDetail
     * @param Loading[]|null $loadings
     * @param Extra[]|null $extras
     * @return CoverageGroup|mixed
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */

    public function getCoverageFromPolicy(PolicyDetail $policyDetail,$loadings=null,$extras=null)
    {

        if (is_null($loadings))
        {
            $loadings=$this->getLoadings($policyDetail->Policy->product_id);
        }

        if (is_null($extras))
        {
            $extras=$this->getExtras();
        }

        $coverageGroup=new CoverageGroup();
        $coverageGroup->Policy=new CoveragePolicy();
        foreach (CoveragePolicy::getReflection() as $filed)
        {
            $coverageGroup->Policy->{$filed}=$policyDetail->Policy->{$filed};
        }


        foreach ($policyDetail->Loading as $loading)
        {
            foreach ($loadings as $baseLoading)
            {
                if (($baseLoading->type==$loading->type) && ($baseLoading->value==$loading->name))
                {
                    $coverageGroup->Loading[]=$li=clone $baseLoading;
                    $li->selected='true';
                }
            }
        }

        foreach ($policyDetail->Extra as $extra)
        {
            foreach ($extras as $baseExtra)
            {
                if ($baseExtra->name==$extra->name)
                {
                    $coverageGroup->Extra[]=$ei=clone $baseExtra;
                    $ei->selected="true";
                }
            }
        }

        $coverageGroup->Policy->vehicle_purchase_date=date("Y-m-d");

        $coverageGroup= $this->getCoverages($coverageGroup);
        $coverageGroup->selectCoverage($policyDetail->Policy->coverage_id);
        return $coverageGroup;


    }


    public function getPolicyRequestFromPolicy(PolicyDetail $policyDetail)
    {

        $policyRequest = new PolicyRequest();
        $policyRequest->setPolicy(New PolicyRequestPolicy());

        $reflection = PolicyRequestPolicy::getReflection();
        foreach ($reflection as $field) {
            $policyRequest->Policy->{$field} = $policyDetail->Policy->{$field};
        }

        $coverageGroup=$this->getCoverageFromPolicy($policyDetail);
        $policyRequest->importFromCoverageGroup($coverageGroup);
        return $policyRequest;
    }




    public function getLoadings($productId)
    {
        $this->login();
        $this->lastResult = $this->client->request('POST', '/ws/policy/getLoadings',
           ["json"=>["product_id"=>$productId]]);

        $data = self::checkData($this->lastResult);
        $result=array();
        foreach ($data['Loading'] as $loading)
        {
            $result[]=Loading::__fromArray($loading);
        }
        return $result;
    }

    public function getExtras()
    {
        $this->login();
        $this->lastResult = $this->client->request('POST', '/ws/policy/getExtras',
           []);

        $data = self::checkData($this->lastResult);
        $result=array();
        foreach ($data['Extra'] as $extra)
        {
            $result[]=Extra::__fromArray($extra);
        }
        return $result;
    }

    /**
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function logout()
    {
        return $this->closeSession();
    }


    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function __destruct()
    {
        $this->closeSession();
    }

    public function _getLastResult()
    {
        return $this->lastResult;
    }


}
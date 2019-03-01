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
use IDefendApi\DataStorage\CoverageGroup;
use IDefendApi\DataStorage\LoggedUser;
use IDefendApi\DataStorage\Maker;
use IDefendApi\DataStorage\Model;
use IDefendApi\DataStorage\PolicyDetail;
use IDefendApi\DataStorage\PolicyRequest;
use IDefendApi\DataStorage\Product;
use IDefendApi\Exception\ApiReplyExcetion;
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
        $result = json_decode($response->getBody()->getContents(), true);
        if (isset($result['data']['error'])) {
            throw new ApiReplyExcetion(is_array($result['data']['error']) ? json_encode($result['data']['error']) : $result['data']['error'],
               isset($result['data']['code']) ? $result['data']['code'] : "0");
        }
        if (isset($result['data'])) {
            return $result['data'];
        }
        throw new UnexpectedValueException($response->getBody()->getContents());
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
     * @param PolicyRequest $policyRequestPolicy
     * @return \IDefendApi\DataStorage\DataStorage|PolicyDetail
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function savePolicy(PolicyRequest $policyRequestPolicy)
    {
        $this->login();
        $this->lastResult = $this->client->request('POST', '/ws/policy/savePolicy',
           ['json' => $policyRequestPolicy]);
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
     * @param string $policyNo
     * @return bool
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function resendSms(string $policyNo)
    {
        $this->login();
        $this->lastResult = $this->client->request('POST', '/ws/policy/resendSms',
           ['json' => ["policy_no" => $policyNo]]);
        $data = self::checkData($this->lastResult);
        return $data['success'];
    }

    /**
     * @param string $policyNo
     * @param string $code
     * @return bool
     * @throws ApiReplyExcetion
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     */
    public function sign(string $policyNo, string $code)
    {
        $this->login();
        $this->lastResult = $this->client->request('POST', '/ws/policy/sign',
           ['json' => ["policy_no" => $policyNo, "auth_code" => $code]]);
        self::checkData($this->lastResult);
        return true;
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


}
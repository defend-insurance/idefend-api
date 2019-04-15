<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 26.02.2019
 * Time: 22:20
 */
require_once __DIR__ . "/../vendor/autoload.php";
error_reporting(E_ALL);
const LOGIN = 'jindra.test';
const PASSWORD = 'dig2019';
const POLICY_NO ='CWPG-007149';

$api = \IDefendApi\Service\IDefendApi::createDev(LOGIN, PASSWORD);

$policy = $api->getPolicy(POLICY_NO);

var_dump($policy);

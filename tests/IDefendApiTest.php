<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 25.02.2019
 * Time: 10:47
 */


use IDefendApi\Service\IDefendApi;
use PHPUnit\Framework\TestCase;

class IDefendApiTest extends TestCase
{

    const login = USER_LOGIN;
    const password = USER_PASSWORD;

    public function testCreateDev()
    {
        $this->assertInstanceOf(IDefendApi::class, IDefendApi::createDev(static::login,static::password), "Dev Created");
    }

    public function testLoginWrong()
    {
        $idefend = IDefendApi::createDev(static::login,'');
        $this->expectException(\IDefendApi\Exception\ApiReplyExcetion::class);
        $idefend->login();

    }

    public function testLogin()
    {
        $idefend = IDefendApi::createDev(self::login, self::password);
        $this->assertInstanceOf(\IDefendApi\Entity\LoggedUser::class, $idefend->login(),"Logged In");
        return $idefend;
    }

    /** @depends testLogin */
    public function testLogout(IDefendApi $defendApi)
    {
        $this->assertEquals(true, $defendApi->logout(),"Test Logged Out");
    }
}

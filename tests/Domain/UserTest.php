<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 2017/06/11
 * Time: 14:50
 */

namespace N1215\SimpleAdr\Domain;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    /** @var  User */
    private $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = new User(new UserId(1), new UserName('Tom'));
    }

    public function testJsonSerialize()
    {
        $this->assertEquals([
            'id' => 1,
            'name' => 'Tom',
        ], $this->user->jsonSerialize());
    }

    public function testGetId()
    {
        $userId = $this->user->getId();
        $this->assertInstanceOf(UserId::class, $userId);
        $this->assertEquals(1, $userId->getValue());
    }

    public function testGetName()
    {
        $userName = $this->user->getName();
        $this->assertInstanceOf(UserName::class, $userName);
        $this->assertEquals('Tom', $userName->getValue());
    }

}
<?php
declare(strict_types=1);

namespace N1215\SimpleAdr\Responder;

use N1215\SimpleAdr\Domain\User;
use N1215\SimpleAdr\Domain\UserId;
use N1215\SimpleAdr\Domain\UserName;
use PHPUnit\Framework\TestCase;
use Zend\Diactoros\ResponseFactory;
use Zend\Diactoros\StreamFactory;

class UserShowJsonResponderTest extends TestCase
{
    /** @var  UserShowJsonResponder */
    private $responder;

    public function setUp(): void
    {
        parent::setUp();

        $this->responder = new UserShowJsonResponder(new ResponseFactory(), new StreamFactory());
    }

    public function testRespond(): void
    {
        $user = new User(new UserId(1), new UserName('Tom'));

        $response = $this->responder->respond($user);
        $this->assertEquals('{"id":1,"name":"Tom"}', $response->getBody()->__toString());

        $notFoundResponse = $this->responder->respond(null);
        $this->assertEquals(404, $notFoundResponse->getStatusCode());
    }
}

<?php

namespace N1215\SimpleAdr\Responder;

use N1215\SimpleAdr\Domain\User;
use PHPUnit\Framework\TestCase;

class UserShowJsonResponderTest extends TestCase
{
    /** @var  UserShowJsonResponder */
    private $responder;

    public function setUp()
    {
        parent::setUp();

        $this->responder = new UserShowJsonResponder();
    }


    public function testRespond()
    {
        $mockUser = \Mockery::mock(User::class);
        $mockUser->shouldReceive('jsonSerialize')
            ->andReturn([
                'id' => 1,
                'name' => 'Tom',
            ]);


        $response = $this->responder->respond($mockUser);
        $this->assertEquals('{"id":1,"name":"Tom"}', $response->getBody()->__toString());


        $notFoundResponse = $this->responder->respond(null);
        $this->assertEquals(404, $notFoundResponse->getStatusCode());
    }

}
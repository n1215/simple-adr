<?php

namespace N1215\SimpleAdr\Action;

use N1215\SimpleAdr\Domain\User;
use N1215\SimpleAdr\Domain\UserShowUseCase;
use N1215\SimpleAdr\Responder\UserShowJsonResponder;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class UserShowActionTest extends TestCase
{

    public function test__invoke()
    {

        $request = \Mockery::mock(ServerRequestInterface::class);
        $request->shouldReceive('getQueryParams')
            ->andReturn([
                'id' => '1'
            ]);

        $response = \Mockery::mock(ResponseInterface::class);

        $user = \Mockery::mock(User::class);

        $useCase = \Mockery::mock(UserShowUseCase::class);
        $useCase->shouldReceive('run')
            ->with(1)
            ->andReturn($user);

        $responder = \Mockery::mock(UserShowJsonResponder::class);
        $responder->shouldReceive('respond')
            ->with($user)
            ->andReturn($response);


        $action = new UserShowAction($useCase, $responder);

        $this->assertEquals($response, $action->__invoke($request));
    }

}
<?php
declare(strict_types=1);

namespace N1215\SimpleAdr\Action;

use N1215\SimpleAdr\Domain\User;
use N1215\SimpleAdr\Domain\UserShowUseCase;
use N1215\SimpleAdr\Responder\UserShowJsonResponder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class UserShowActionTest extends TestCase
{
    public function test_handle(): void
    {
        /** @var ServerRequestInterface|MockObject $request */
        $request = $this->createMock(ServerRequestInterface::class);
        $request
            ->expects($this->once())
            ->method('getQueryParams')
            ->willReturn([
                'id' => '1'
            ]);

        /** @var ResponseInterface|MockObject $request */
        $response = $this->createMock(ResponseInterface::class);

        /** @var User|MockObject $request */
        $user = $this->createMock(User::class);

        /** @var UserShowUseCase|MockObject $request */
        $useCase = $this->createMock(UserShowUseCase::class);
        $useCase
            ->expects($this->once())
            ->method('run')
            ->with($this->equalTo(1))
            ->willReturn($user);

        /** @var UserShowJsonResponder|MockObject $request */
        $responder = $this->createMock(UserShowJsonResponder::class);
        $responder
            ->expects($this->once())
            ->method('respond')
            ->with($user)
            ->willReturn($response);

        $action = new UserShowAction($useCase, $responder);

        $this->assertEquals($response, $action->handle($request));
    }
}

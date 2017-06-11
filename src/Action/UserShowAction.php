<?php

namespace N1215\SimpleAdr\Action;

use N1215\SimpleAdr\Domain\UserShowUseCase;
use N1215\SimpleAdr\Responder\UserShowJsonResponder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class UserShowAction
{
    /**
     * @var UserShowUseCase
     */
    private $useCase;

    /**
     * @var UserShowJsonResponder
     */
    private $responder;

    public function __construct(UserShowUseCase $useCase, UserShowJsonResponder $responder)
    {
        $this->useCase = $useCase;
        $this->responder = $responder;
    }

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        $rawUserId = isset($queryParams['id']) ? intval($queryParams['id']) : null;
        return $this->responder->respond($this->useCase->run($rawUserId));
    }
}
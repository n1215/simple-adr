<?php
declare(strict_types=1);

namespace N1215\SimpleAdr\Action;

use N1215\SimpleAdr\Domain\UserShowUseCase;
use N1215\SimpleAdr\Responder\UserShowJsonResponder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * User show action
 * @package N1215\SimpleAdr\Action
 */
class UserShowAction implements RequestHandlerInterface
{
    /**
     * @var UserShowUseCase
     */
    private $useCase;

    /**
     * @var UserShowJsonResponder
     */
    private $responder;

    /**
     * @param UserShowUseCase $useCase
     * @param UserShowJsonResponder $responder
     */
    public function __construct(UserShowUseCase $useCase, UserShowJsonResponder $responder)
    {
        $this->useCase = $useCase;
        $this->responder = $responder;
    }

    /**
     * @inheritdoc
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        $rawUserId = isset($queryParams['id']) ? (int) $queryParams['id'] : null;
        return $this->responder->respond($this->useCase->run($rawUserId));
    }
}

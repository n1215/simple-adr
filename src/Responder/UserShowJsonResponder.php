<?php
declare(strict_types=1);

namespace N1215\SimpleAdr\Responder;

use N1215\SimpleAdr\Domain\User;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * User show responder
 * @package N1215\SimpleAdr\Responder
 */
class UserShowJsonResponder
{
    /**
     * @var ResponseFactoryInterface
     */
    private $responseFactory;

    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;

    public function __construct(ResponseFactoryInterface $responseFactory, StreamFactoryInterface $streamFactory)
    {
        $this->responseFactory = $responseFactory;
        $this->streamFactory = $streamFactory;
    }

    /**
     * @param User|null $user
     * @return ResponseInterface
     */
    public function respond(User $user = null): ResponseInterface
    {
        if($user === null) {
            return $this->createJsonResponse([
                'error' => [
                    'type' => 'not_found',
                    'message' => 'User not found.',
                ],
            ], 404);
        }

        return $this->createJsonResponse($user, 200);
    }

    /**
     * @param array|\JsonSerializable $body
     * @param int $status
     * @return ResponseInterface
     */
    private function createJsonResponse($body, int $status): ResponseInterface
    {
        return $this->responseFactory
            ->createResponse($status)
            ->withBody($this->streamFactory->createStream(\json_encode($body)))
            ->withHeader('content-type', 'application/json');
    }
}

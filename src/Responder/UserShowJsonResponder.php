<?php
declare(strict_types=1);

namespace N1215\SimpleAdr\Responder;

use N1215\SimpleAdr\Domain\User;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * User show responder
 * @package N1215\SimpleAdr\Responder
 */
class UserShowJsonResponder
{
    /**
     * @param User|null $user
     * @return ResponseInterface
     */
    public function respond(User $user = null): ResponseInterface
    {
        if($user === null) {
            return new JsonResponse([
                'error' => [
                    'type' => 'not_found',
                    'message' => 'User not found.',
                ],
            ], 404);
        }

        return new JsonResponse($user, 200);
    }
}

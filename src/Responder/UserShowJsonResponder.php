<?php
declare(strict_types=1);

namespace N1215\SimpleAdr\Responder;

use N1215\SimpleAdr\Domain\User;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * ユーザ詳細レスポンダー
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
        if(is_null($user)) {
            return new JsonResponse([
                'error' => [
                    'type' => 'not_found',
                    'message' => '見つかりません',
                ],
            ], 404);
        }

        return new JsonResponse($user, 200);
    }
}

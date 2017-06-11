<?php

namespace N1215\SimpleAdr\Responder;


use N1215\SimpleAdr\Domain\User;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;

class UserShowJsonResponder
{

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
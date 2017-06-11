<?php

require __DIR__ . '/../vendor/autoload.php';

use N1215\SimpleAdr\Action\UserShowAction;
use N1215\SimpleAdr\Domain\User;
use N1215\SimpleAdr\Domain\UserId;
use N1215\SimpleAdr\Domain\UserName;
use N1215\SimpleAdr\Domain\UserShowUseCase;
use N1215\SimpleAdr\Responder\UserShowJsonResponder;

function createAction() {
    $useCase = new UserShowUseCase([
        new User(new UserId(1), new UserName('Tom')),
        new User(new UserId(2), new UserName('Mary')),
    ]);
    $responder = new UserShowJsonResponder();
    return new UserShowAction($useCase, $responder);
}

$action = createAction();
$request = \Zend\Diactoros\ServerRequestFactory::fromGlobals();
$response = $action->__invoke($request);
(new \Zend\Diactoros\Response\SapiEmitter())->emit($response);

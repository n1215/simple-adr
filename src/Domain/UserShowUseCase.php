<?php

namespace N1215\SimpleAdr\Domain;


class UserShowUseCase
{

    /**
     * @var User[]
     */
    private $users;

    /**
     * @param User[] $users
     */
    public function __construct(array $users)
    {
        $this->users = [];

        foreach ($users as $user) {
            $this->addUser($user);
        }
    }

    /**
     * ユーザーを追加
     */
    private function addUser(User $user): void
    {
        $this->users[] = $user;
    }

    /**
     * IDを指定してユーザーを取得
     */
    public function run(?int $rawUserId): ?User
    {
        $userId = new UserId($rawUserId);
        foreach($this->users as $user) {
            if ($user->getId()->equals($userId)) {
                return $user;
            }
        }

        return null;
    }
}
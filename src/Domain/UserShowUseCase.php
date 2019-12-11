<?php
declare(strict_types=1);

namespace N1215\SimpleAdr\Domain;

/**
 * Get user detail
 * @package N1215\SimpleAdr\Domain
 */
class UserShowUseCase
{
    /**
     * @var User[]
     */
    private $users;

    /**
     * @param User[] $users
     */
    public function __construct(User ...$users)
    {
        $this->users = $users;
    }

    /**
     * @param int|null $rawUserId
     * @return User|null
     */
    public function run(?int $rawUserId): ?User
    {
        $userId = new UserId($rawUserId);
        foreach ($this->users as $user) {
            if ($user->getId()->equals($userId)) {
                return $user;
            }
        }

        return null;
    }
}

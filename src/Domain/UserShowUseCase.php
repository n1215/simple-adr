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
    public function __construct(array $users)
    {
        $this->users = [];

        foreach ($users as $user) {
            $this->addUser($user);
        }
    }

    /**
     * @param User $user
     */
    private function addUser(User $user): void
    {
        $this->users[] = $user;
    }

    /**
     * @param int|null $rawUserId
     * @return User|null
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

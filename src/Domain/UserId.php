<?php
declare(strict_types=1);

namespace N1215\SimpleAdr\Domain;

/**
 * User ID
 * @package N1215\SimpleAdr\Domain
 */
class UserId
{
    /**
     * @var int|null
     */
    private $userId;

    /**
     * @param int|null $userId
     */
    public function __construct(?int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int|null
     */
    public function getValue(): ?int
    {
        return $this->userId;
    }

    /**
     * @param UserId $userId
     * @return bool
     */
    public function equals(UserId $userId): bool
    {
        return $this->getValue() === $userId->getValue();
    }
}

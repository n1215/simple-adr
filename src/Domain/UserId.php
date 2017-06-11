<?php

namespace N1215\SimpleAdr\Domain;

class UserId
{
    /** @var int|null */
    private $userId;

    public function __construct(?int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * スカラー値を取得
     */
    public function getValue(): ?int
    {
        return $this->userId;
    }

    /**
     * 同じIDかどうか判定
     * @param UserId $userId
     * @return bool
     */
    public function equals(UserId $userId): bool
    {
        return $this->getValue() === $userId->getValue();
    }
}
<?php
declare(strict_types=1);

namespace N1215\SimpleAdr\Domain;

/**
 * ユーザID
 * @package N1215\SimpleAdr\Domain
 */
class UserId
{
    /**
     * @var int|null
     */
    private $userId;

    /**
     * コンストラクタ
     * @param int|null $userId
     */
    public function __construct(?int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * スカラー値を取得
     * @return int|null
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

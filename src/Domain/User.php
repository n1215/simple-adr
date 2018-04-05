<?php
declare(strict_types=1);

namespace N1215\SimpleAdr\Domain;

/**
 * ユーザ
 * @package N1215\SimpleAdr\Domain
 */
class User implements \JsonSerializable
{
    /**
     * @var UserId
     */
    private $userId;

    /**
     * @var UserName
     */
    private $userName;

    /**
     * コンストラクタ
     * @param UserId $userId
     * @param UserName $userName
     */
    public function __construct(UserId $userId, UserName $userName)
    {
        $this->userId = $userId;
        $this->userName = $userName;
    }

    /**
     * ユーザー名を取得
     * @return UserName
     */
    public function getName() : UserName
    {
        return $this->userName;
    }

    /**
     * ユーザーIDを取得
     * @return UserId
     */
    public function getId() : UserId
    {
        return $this->userId;
    }

    /**
     * JSON用の配列に変換
     * @return array
     */
    public function jsonSerialize() : array
    {
        $rawId = $this->userId->getValue();
        $rawName = $this->userName->getValue();

        return [
            'id' => $rawId,
            'name' => $rawName,
        ];
    }
}

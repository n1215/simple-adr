<?php
declare(strict_types=1);

namespace N1215\SimpleAdr\Domain;

use JsonSerializable;

/**
 * User
 * @package N1215\SimpleAdr\Domain
 */
class User implements JsonSerializable
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
     * @param UserId $userId
     * @param UserName $userName
     */
    public function __construct(UserId $userId, UserName $userName)
    {
        $this->userId = $userId;
        $this->userName = $userName;
    }

    /**
     * @return UserName
     */
    public function getName() : UserName
    {
        return $this->userName;
    }

    /**
     * @return UserId
     */
    public function getId() : UserId
    {
        return $this->userId;
    }

    /**
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

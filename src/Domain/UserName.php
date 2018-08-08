<?php
declare(strict_types=1);

namespace N1215\SimpleAdr\Domain;

/**
 * User name
 * @package N1215\SimpleAdr\Domain
 */
class UserName
{
    /**
     * @var string
     */
    private $userName;

    /**
     * @param string $userName
     */
    public function __construct(string $userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getValue() : string
    {
        return $this->userName;
    }
}

<?php

namespace N1215\SimpleAdr\Domain;

class UserName
{
    /** @var string */
    private $userName;

    public function __construct(string $userName)
    {
        $this->userName = $userName;
    }

    /**
     * スカラー値を取得
     */
    public function getValue() : string
    {
        return $this->userName;
    }
}
<?php
declare(strict_types=1);

namespace N1215\SimpleAdr\Domain;

/**
 * ユーザ名
 * @package N1215\SimpleAdr\Domain
 */
class UserName
{
    /**
     * @var string
     */
    private $userName;

    /**
     * コンストラクタ
     * @param string $userName
     */
    public function __construct(string $userName)
    {
        $this->userName = $userName;
    }

    /**
     * スカラー値を取得
     * @return string
     */
    public function getValue() : string
    {
        return $this->userName;
    }
}

<?php
declare(strict_types=1);

namespace N1215\SimpleAdr\Domain;

use PHPUnit\Framework\TestCase;

class UserShowUseCaseTest extends TestCase
{
    /** @var  UserShowUseCase */
    private $useCase;

    protected function setUp()
    {
        parent::setUp();

        $this->useCase = new UserShowUseCase([
            new User(new UserId(1), new UserName('Tom')),
            new User(new UserId(2), new UserName('Mary')),
        ]);
    }

    public function testRun()
    {
        $this->assertNull($this->useCase->run(null));
        $this->assertNull($this->useCase->run(3));

        $user = $this->useCase->run(1);
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(1, $user->getId()->getValue());
        $this->assertEquals('Tom', $user->getName()->getValue());

        $user = $this->useCase->run(2);
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(2, $user->getId()->getValue());
        $this->assertEquals('Mary', $user->getName()->getValue());
    }
}

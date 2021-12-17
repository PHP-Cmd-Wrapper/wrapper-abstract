<?php

namespace CmdWrapper\Wrapper\Core\Tests;

use CmdWrapper\Wrapper\Core\RunContext;
use PHPUnit\Framework\TestCase;

class RunContextTest extends TestCase
{
    public function providerForTestHasDir(): array
    {
        return [
            ['', false,],
            ['/var/www/', true],
        ];
    }

    /**
     * @@dataProvider providerForTestHasDir
     * @covers \CmdWrapper\Wrapper\Core\RunContext::hasDir
     */
    public function testHasDir(string $dir, bool $expected): void
    {
        self::assertEquals($expected, (new RunContext('', $dir))->hasDir());
    }
}

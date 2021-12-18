<?php

namespace CmdWrapper\Wrapper\Core;

class RunContext
{
    public function __construct(
        public string $bin,
        public string $dir,
    ) {
        //
    }

    public static function null(): self
    {
        return new self('', '');
    }

    public function hasDir(): bool
    {
        return mb_strlen($this->dir) > 0;
    }
}

<?php

namespace CmdWrapper\Wrapper\Wrapper;

class RunContext
{
    public function __construct(
        public string $bin,
        public string $dir,
    ) {
        //
    }

    public function hasDir(): bool
    {
        return mb_strlen($this->dir) > 0;
    }
}

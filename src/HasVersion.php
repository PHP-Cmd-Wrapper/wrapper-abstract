<?php

namespace CmdWrapper\Wrapper\Core;

use ArtARTs36\ShellCommand\Interfaces\ShellCommandExecutor;
use ArtARTs36\ShellCommand\Interfaces\ShellCommandInterface;
use CmdWrapper\Contracts\ComputedVersion;
use CmdWrapper\Contracts\Version;

trait HasVersion
{
    abstract protected function getCommandExecutor(): ShellCommandExecutor;

    abstract protected function newCommand(): ShellCommandInterface;

    public function version(): Version
    {
        return new ComputedVersion(...$this
            ->newCommand()
            ->addOption('version')
            ->executeOrFail($this->getCommandExecutor())
            ->getResult()
            ->trim()
            ->explode('.')
            ->toIntegers());
    }
}

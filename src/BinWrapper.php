<?php

namespace CmdWrapper\Wrapper\Core;

use ArtARTs36\ShellCommand\Executors\ProcOpenExecutor;
use ArtARTs36\ShellCommand\Interfaces\CommandBuilder;
use ArtARTs36\ShellCommand\Interfaces\ShellCommandExecutor;
use ArtARTs36\ShellCommand\Interfaces\ShellCommandInterface;
use ArtARTs36\ShellCommand\ShellCommander;
use CmdWrapper\Contracts\Wrapper;

abstract class BinWrapper implements Wrapper
{
    use HasVersion;

    protected static string $defaultBinary = '';

    final public function __construct(
        protected CommandBuilder $commandBuilder,
        protected ShellCommandExecutor $commandExecutor,
        protected RunContext $context,
    ) {
        //
    }

    public static function local(string $bin = '', string $dir = ''): self
    {
        return new static(
            new ShellCommander(),
            new ProcOpenExecutor(),
            new RunContext(mb_strlen($bin) > 0 ? $bin : static::$defaultBinary, $dir)
        );
    }

    protected function newCommand(): ShellCommandInterface
    {
        return $this->context->hasDir() ?
            $this->commandBuilder->makeNavigateToDir($this->context->dir, $this->context->bin) :
            $this->commandBuilder->make($this->context->bin);
    }

    protected function getCommandExecutor(): ShellCommandExecutor
    {
        return $this->commandExecutor;
    }
}

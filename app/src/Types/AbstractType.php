<?php

namespace FloWork\Types;

use Closure;
use Throwable;

abstract class AbstractType
{
    public function __construct(
        protected array $steps,
        protected Closure|null $onSuccess = null,
        protected Closure|null $onFailure = null
    )
    { }

    abstract public function execute(): void;

    protected function failure(Throwable $exception)
    {
        $onFailure = $this->onFailure;

        return $onFailure($exception);
    }
}
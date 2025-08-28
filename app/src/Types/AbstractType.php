<?php

namespace FloWork\Types;

use Closure;
use Throwable;

abstract class AbstractType
{
    protected array $markers = [];

    public function __construct(
        protected array $steps,
        protected Closure|null $onSuccess = null,
        protected Closure|null $onFailure = null
    )
    { }

    abstract public function execute(): void;

    protected function failure(Throwable $exception, AbstractType $workflow)
    {
        $onFailure = $this->onFailure;

        return $onFailure($exception, $workflow);
    }

    protected function success()
    {
        $onSuccess = $this->onSuccess;

        return $onSuccess($this);
    }

    protected function marker(string $step, mixed $result)
    {
        $this->markers[$step] = $result;
    }

    public function resume()
    {
        foreach ($this->steps as $step => $result) {
            if (! isset($this->markers[$step])) {
                echo "$step: - \n";
                continue ;
            }
 
            echo "$step: {$this->markers[$step]} \n";
        }
    }
}
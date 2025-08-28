<?php

namespace FloWork;

use \FloWork\Contracts\Workflow as ContractWorkflow;

class Workflow
{
    protected ContractWorkflow $instance;

    public function __construct(
        protected string $type,
        protected array $steps,
        protected \Closure|null $onSuccess = null,
        protected \Closure|null $onFailure = null
    )
    {
        $this->instance = new $type(
            steps: $steps, 
            onSuccess: $onSuccess,
            onFailure: $onFailure,
        );
    }

    public function execute()
    {
       $this->instance->execute();
    }
}
<?php

namespace FloWork\Types;

use Exception;
use \FloWork\Contracts\Workflow as ContractWorkflow;

class Sequential extends AbstractType implements ContractWorkflow
{
    public function execute(): void
    {
        try {
            foreach ($this->steps as $step) {
                $next = $step();

                if (! $next) {
                    break ;
                }
            }
        } catch (Exception $exception) {
            $this->failure($exception);
        }
    }
}
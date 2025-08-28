<?php

namespace FloWork\Types;

use Exception;
use \FloWork\Contracts\Workflow as ContractWorkflow;

class Sequential extends AbstractType implements ContractWorkflow
{
    public function execute(): void
    {
        try {
            foreach ($this->steps as $key => $step) {
                $next = $step();

                $this->marker($key, $next);

                if (! $next) {
                    break ;
                }
            }

            if ($this->onSuccess) {
                $this->success();
            }
        } catch (Exception $exception) {
            $this->failure($exception, $this);
        }
    }
}
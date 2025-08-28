<?php

namespace FloWork\Types;

use Exception;
use \FloWork\Types\AbstractType;
use \FloWork\Contracts\Workflow as ContractWorkflow;

class Event extends AbstractType implements ContractWorkflow
{
    public function execute(): void
    {
        $stepKey = $this->getStepIndex(0);

        try {
            while ($stepKey) {
                $step = $this->steps[$stepKey];

                $nextStep = $step();

                unset($this->steps[$stepKey]);

                $stepKey = $nextStep;
            }
        } catch (Exception $exception) {
            if ($this->onFailure) {
                $this->failure($exception);
            }
        }
    }

    protected function getStepIndex(int $index = 0)
    {
        return array_keys($this->steps)[$index];
    }
}
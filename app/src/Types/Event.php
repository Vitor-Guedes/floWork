<?php

namespace FloWork\Types;

use Exception;
use \FloWork\Types\AbstractType;
use \FloWork\Contracts\Workflow as ContractWorkflow;

class Event extends AbstractType implements ContractWorkflow
{
    public function execute(): void
    {
        $cloneSteps = $this->steps;
        $stepKey = $this->getStepIndex(0, $cloneSteps);

        try {
            while ($stepKey) {
                if (isset($this->steps[$stepKey])) {
                    echo "\e[1;37;42m{$stepKey}:\e[0m\n\t";
                    
                    $step = $cloneSteps[$stepKey];

                    $nextStep = $step();
                
                    $this->marker($stepKey, $nextStep);

                    unset($cloneSteps[$stepKey]);

                    $stepKey = $nextStep;
                } else {
                    $stepKey = false;
                }
            }

            if ($this->onSuccess) {
                $this->success();
            }
        } catch (Exception $exception) {
            if ($this->onFailure) {
                $this->failure($exception, $this);
            }
        }
    }

    protected function getStepIndex(int $index = 0, array $steps = [])
    {
        return array_keys($steps)[$index];
    }

    // Vermelho echo "\033[31mEste texto está em vermelho.\033[0m\n";
    // Verde echo "\e[0;31;41mError:\e[0m\n\t";
}
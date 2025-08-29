<?php

namespace FloWork\Types;

use Exception;
use FloWork\Contracts\Workflow as ContractsWorkflow;
use SplQueue;

class Coroutine extends AbstractType implements ContractsWorkflow
{
    protected SplQueue $queue;

    public function execute(): void
    {
        $this->queue = new SplQueue();
        
        foreach ($this->steps as $key => $step) {
            $this->queue->enqueue((function () use ($step) {
                return $step();
            })());
        }

        try {
            while (! $this->queue->isEmpty()) {
                $step = $this->queue->dequeue();
                $step->next();

                if ($step->valid()) {
                    $this->queue->enqueue($step);
                }
            }

            $this->success();
        } catch (Exception $exception) {
            $this->failure($exception, $this);
        }
    }
}
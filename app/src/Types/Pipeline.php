<?php

namespace FloWork\Types;

use Exception;
use FloWork\Contracts\Workflow as ContractWorkflow;

class Pipeline extends AbstractType implements ContractWorkflow
{
    protected $subject;

    public function execute(): void
    {
        try {
            foreach ($this->steps as $key => $step) {
                $result = $step($this);

                $this->marker($key, $result);
            }

            $this->success($this);
        } catch (Exception $exception) {
            $this->failure($exception, $this);
        }
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function getSubject()
    {
        return $this->subject;
    }
}
<?php

return [
    'step-1' => function () {
        echo "Step 1" . PHP_EOL;
        
        return true;
    },
    'step-2' => function () {
        echo "Step 2" . PHP_EOL;

        if (rand(0, 1)) {
            throw new \Exception("Exceção randomizada.");
        }

        return true;
    },
    'step-3' => function () {
        echo "Step 3" . PHP_EOL;
        
        return true;
    },
    'step-4' => function () {
        echo "Step 4" . PHP_EOL;

        if (rand(0, 1)) {
            throw new \Exception("Exceção randomizada.");
        }

        return true;
    },
    'step-5' => function () {
        echo "Step 5" . PHP_EOL;
        sleep(2);
        return true;
    },
];
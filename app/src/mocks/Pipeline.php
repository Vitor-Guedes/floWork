<?php

return [
    'step-1' => function ($workflow) {
        $name = "Vitor";

        $workflow->setSubject($name);

        echo $workflow->getSubject() . PHP_EOL;

        return "ok";
    },
    'step-2' =>  function ($workflow) {
        $middlename = $workflow->getSubject() . " Guedes";

        $workflow->setSubject($middlename);

        // echo $workflow->getSubject() . PHP_EOL;

        return "ok";
    },
    'step-3' =>  function ($workflow) {
        $fullname = $workflow->getSubject() . " Gomes";

        $workflow->setSubject($fullname);

        echo $workflow->getSubject() . PHP_EOL;

        return "ok";
    }
];
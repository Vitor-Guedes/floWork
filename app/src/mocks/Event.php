<?php

return [
    'step-age' => function () {
        $age = rand(15, 17);

        echo "Idade: $age" . PHP_EOL;

        return $age >= 18 
            ? "step-major-legal-age"
                : "step-under-legal-age";
    },
    'step-major-legal-age' => function () {
        echo "É maio de idade." . PHP_EOL;

        if (rand(0, 1)) {
            throw new \Exception("Algo deu Errado. #Teste");
        }

        return "send-email";
    },
    'step-under-legal-age' => function () {
        echo "É menor de idade." . PHP_EOL;

        return "send-sms";
    },
    'send-email' => function () {
        echo "Enviar EMAIL para a pessoa maior de idade." . PHP_EOL;

        if (rand(0, 1)) {
            throw new \Exception("Algo deu Errado. #Teste");
        }

        return "ok";
    },
    'send-sms' => function () {
        echo "Enviar SMS para a pessoa maior de idade." . PHP_EOL;

        if (rand(0, 1)) {
            throw new \Exception("Algo deu Errado. #Teste");
        }

        return "make-call";
    },
    'make-call' => function () {
        echo "Ligar para o responsavel." . PHP_EOL;

        if (rand(0, 1)) {
            throw new \Exception("Algo deu Errado. #Teste");
        }

        return 'ok';
    },
];
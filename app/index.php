<?php

require __DIR__ . "/vendor/autoload.php";

// Workflow - Fluxo que vai seguir determinado caminho dependedo das váriações de respostas
// Tipos de Fluxos: Sequencial e Evento
$onFailure = function ($exception, $workflow) {
    echo "\e[0;31;41mError:\e[0m\n\t";
    echo $exception->getMessage() . PHP_EOL;

    $workflow->resume();

    return false;
};

$onSuccess = function ($workflow) {
    $workflow->resume();
};

$options = getopt('t:');
$wotkflowTypes = [
    'sequential' => [
        'file' => __DIR__ . "/src/mocks/Sequential.php",
        'class' => \FloWork\Types\Sequential::class
    ],
    'event' => [
        'file' => __DIR__ . "/src/mocks/Event.php",
        'class' => \FloWork\Types\Event::class
    ],
    'pipeline' => [
        'file' => __DIR__ . "/src/mocks/Pipeline.php",
        'class' => \FloWork\Types\Pipeline::class
    ],
    'coroutine' => [
        'file' => __DIR__ . "/src/mocks/Coroutine.php",
        'class' => \FloWork\Types\Coroutine::class
    ]
];

if (! isset($wotkflowTypes[$options['t'] ?? ''])) {
    echo "Nenhum flow definido para o tipo: {$options['t']}" . PHP_EOL;
    exit;
}

$workflow = new \FloWork\Workflow(
    type: $wotkflowTypes[$options['t']]['class'], 
    steps: require $wotkflowTypes[$options['t']]['file'], 
    onSuccess: $onSuccess,
    onFailure: $onFailure,
);
$workflow->execute();
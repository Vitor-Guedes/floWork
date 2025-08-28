<?php

require __DIR__ . "/vendor/autoload.php";

// Workflow - Fluxo que vai seguir determinado caminho dependedo das váriações de respostas
// Tipos de Fluxos - 
// Sequencial, Evento
$onFailure = function ($exception) {
    echo $exception->getMessage() . PHP_EOL;

    return false;
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
    ]
];

if (! isset($wotkflowTypes[$options['t'] ?? ''])) {
    echo "Nenhum flow definido para o tipo: {$options['t']}" . PHP_EOL;
    exit;
}

$workflow = new \FloWork\Workflow(
    type: $wotkflowTypes[$options['t']]['class'], 
    steps: require $wotkflowTypes[$options['t']]['file'], 
    onFailure: $onFailure
);
$workflow->execute();
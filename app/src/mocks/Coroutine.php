<?php

return [
    'task-1' => function () {
        $name = 'task-1';
        $max = rand(3, 6);
        $delay = rand(100, 400);

        for ($i = 1; $i <= $max; $i++) {
            echo "$name: passo $i\n";
            for ($j = 0; $j < $delay * 1000; $j++) {

            }
            yield;
        }
        echo "$name terminou!\n";
    },
    'task-2' => function () {
        $name = 'task-2';
        $max = rand(3, 6);
        $delay = rand(100, 400);

        for ($i = 1; $i <= $max; $i++) {
            echo "$name: passo $i\n";
            for ($j = 0; $j < $delay * 1000; $j++) {

            }
            yield;
        }
        echo "$name terminou!\n";
    },
    'task-3' => function () {
        $name = 'task-3';
        $max = rand(3, 6);
        $delay = rand(100, 400);

        for ($i = 1; $i <= $max; $i++) {
            echo "$name: passo $i\n";
            for ($j = 0; $j < $delay * 1000; $j++) {

            }
            yield;
        }
        echo "$name terminou!\n";
    },
    'task-4' => function () {
        $name = 'task-4';
        $max = rand(3, 6);
        $delay = rand(100, 400);

        for ($i = 1; $i <= $max; $i++) {
            echo "$name: passo $i\n";
            for ($j = 0; $j < $delay * 1000; $j++) {

            }
            yield;
        }
        echo "$name terminou!\n";
    },
    'task-5' => function () {
        $name = 'task-5';
        $max = rand(3, 6);
        $delay = rand(100, 400);

        for ($i = 1; $i <= $max; $i++) {
            echo "$name: passo $i\n";
            for ($j = 0; $j < $delay * 1000; $j++) {

            }
            yield;
        }
        echo "$name terminou!\n";
    }
];
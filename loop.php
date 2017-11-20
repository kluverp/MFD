<?php

use React\EventLoop\Factory;

require __DIR__ . '/vendor/autoload.php';

if (stream_set_blocking(STDIN, false) !== true) {
    fwrite(STDERR, 'ERROR: Unable to set STDIN non-blocking' . PHP_EOL);
    exit(1);
}

$i = 0;
$chars = ['|', '/', '-', '\\', '|'];
$rounds = 500;
$screen = '-';

//system('stty cbreak -echo');
system('stty -icanon -echo');
$stdin = fopen('php://stdin', 'r');



$loop = Factory::create();

while(1) {
    $loop->addTimer(0.01, function () use ($chars, $screen, $rounds, $i) {

        system('clear');

        echo $chars[$i];
        echo $screen;
        echo $rounds;
    });

    $c = ord(fgetc($stdin));



    switch($c) {
        case 27:
            $screen = 'ESC';
            break;
        case 49:
            $screen = 'one';
            break;
        case 50:
            $screen = 'two';
            break;
        case 32:
            $rounds -= 1;
            break;
    }

    $i++;
    if($i >= count($chars)) {
        $i = 0;
    }


    $loop->run();
}
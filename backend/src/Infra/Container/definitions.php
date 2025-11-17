<?php

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

return function (ContainerBuilder $builder) {
    $builder->addDefinitions([

        Logger::class => function () {
            $logger = new Logger('app');
            $logger->pushHandler(new StreamHandler(dirname(__DIR__, 3) .  '/storage/app.log'));
            return $logger;
        },

    ]);
};

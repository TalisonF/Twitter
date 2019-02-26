<?php

namespace App;

use DI\ContainerBuilder;

class Application extends \DI\Bridge\Slim\App
{

    protected function configureContainer(ContainerBuilder $builder)
    {
        $builder->addDefinitions(__DIR__ . '/../config/doctrine.php');
        $builder->addDefinitions(__DIR__ . '/../config/settings.php');
        $builder->addDefinitions(__DIR__ . '/../config/repositories.php');
        $builder->addDefinitions(__DIR__ . '/../config/dependencies.php');
        $builder->useAnnotations(true);
    }

}
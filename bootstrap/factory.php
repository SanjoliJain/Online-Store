<?php

namespace App;

use Router\RouteManager;
use Configurator\ConfigManager;
use Authenticator\Authenticate;
use DBC\DatabaseFactory;

class Factory
{
    public static function getConfigManager()
    {
        return ConfigManager::getInstance();
    }

    public static function getRouteManager()
    {
        $configManager = self::getConfigManager();
        return RouteManager::getInstance($configManager);
    }

    public static function getAuthManager()
    {
        $databaseFactory = self::getDatabaseFactory();
        return new Authenticate($databaseFactory);
    }

    public static function getDatabaseFactory()
    {
        $configManager = self::getConfigManager();
        return DatabaseFactory::getInstance($configManager);
    }

}



 ?>

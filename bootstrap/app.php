<?php

namespace App;

use App\Factory;

class App
{
    private $configManager;
    private $routeManager;
    private $authManager;

    public function run()
    {
        $this->configManager = Factory::getConfigManager();
        $this->routeManager = Factory::getRouteManager();
        $this->authManager = Factory::getAuthManager();
        $this->route();
    }

    private function checkAuthentication()
    {
	$request = $this->routeManager->getRequest();
        if (!$this->authManager->isUserLoggedIn($request)) {
            $this->routeManager->routeToError(403);
        }
    }

    private function route()
    {
        if ($this->routeManager->needsAuth()) {
            $this->checkAuthentication();
        }
        $route = $this->routeManager->route();
    }
}

?>

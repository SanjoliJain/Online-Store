<?php

namespace Configurator;

class ConfigManager
{
    private static $instance;
    private $config;

    private function __construct()
    {
        $this->config = array();
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new ConfigManager();
            self::$instance->loadConfigDir(__DIR__ . '/../../config');
        }
        return self::$instance;
    }

    private function loadConfigDir($dir)
    {
        $handle = opendir($dir);
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $arrayIndex = substr($entry, 0, strpos($entry, '.php'));
                $this->config[$arrayIndex] = (include "$dir/$entry");
            }
        }
        closedir($handle);
        return $this->config;
    }

   /* public function getAllConfig()
    {
        return $this->config;
    }*/

    public function get($configName)
    {
        if (array_key_exists($configName, $this->config)) {
            return $this->config[$configName];
        }
        return false;
    }
}

?>

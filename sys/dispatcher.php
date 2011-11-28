<?php
/**
* Authors:
*   Thetan ( Joseph Moniz )
**/

// add our library path to the include path
set_include_path(
    get_include_path() .
    PATH_SEPARATOR .
    dirname(dirname(__FILE__)) .
    'library'
);

class lazyLoader
{
    const PREFIX            = "lazyLoaderStat:";
    const PREFIX_MODEL      = "model:";
    const PREFIX_CONTROLLER = "controller:";
    const PREFIX_LIBRARY    = "library:";
    const PREFIX_EVENT      = "events:";
    const PREFIX_DRIVER     = "drivers:";

    private $root;

    private static $instance;

    private function __construct()
    {
        $this->root = dirname(dirname(__FILE__)) . '/';

        spl_autoload_register(null, false);
        spl_autoload_extensions('.php');
        spl_autoload_register(array($this, 'cached'));
        spl_autoload_register(array($this, 'library'));
        spl_autoload_register(array($this, 'model'));
        spl_autoload_register(array($this, 'event'));
        spl_autoload_register(array($this, 'controller'));
        spl_autoload_register(array($this, 'driver'));
    }

    public function cached($name)
    {
        $cached = apc_fetch(self::PREFIX . $name);

        if ($cached === null || $cached === false)
        {
            return false;
        }

        include $cached;
        return true;
    }

    public function model($name)
    {
        $key    = self::PREFIX . self::PREFIX_MODEL . $name;
        $cached = apc_fetch($key);

        if ($cached === null) { return false; }
        if ($cached !== false)
        {
            apc_store(self::PREFIX . $name, $cached);
            include $cached;
            return true;
        }

        if ($name[0] == strtoupper($name[0]))
        {
            apc_store(self::PREFIX . $name, null);
            apc_store($key, null);
            return false;
        }

        $name = strtolower($name);
        $file = "{$this->root}application/models/{$name}.php";
        if (!file_exists($file))
        {
            apc_store(self::PREFIX . $name, null);
            apc_store($key, null);
            return false;
        }

        apc_store(self::PREFIX . $name, $file);
        apc_store($key, $file);
        include $file;
    }

    public function controller($name)
    {
        $key    = self::PREFIX . self::PREFIX_CONTROLLER . $name;
        $cached = apc_fetch($key);

        if ($cached === null) { return false; }
        if ($cached !== false)
        {
            apc_store(self::PREFIX . $name, $cached);
            include $cached;
            return true;
        }

        if (strncmp($name, "controller_", 11) !== 0)
        {
            apc_store(self::PREFIX . $name, null);
            apc_store($key, null);
            return false;
        }

        $name = substr($name, 11);
        $file = "{$this->root}application/controllers/{$name}.php";
        if (!file_exists($file))
        {
            apc_store(self::PREFIX . $name, null);
            apc_store($key, null);
            return false;
        }

        apc_store(self::PREFIX . $name, $file);
        apc_store($key, $file);
        include $file;
    }

    public function library($name)
    {
        $key    = self::PREFIX . self::PREFIX_LIBRARY . $name;
        $cached = apc_fetch($key);

        if ($cached === null) { return false; }
        if ($cached !== false)
        {
            apc_store(self::PREFIX . $name, $cached);
            include $cached;
            return true;
        }

        if ($name[0] != strtoupper($name[0]))
        {
            apc_store(self::PREFIX . $name, null);
            apc_store($key, null);
            return false;
        }

        $name = strtolower($name);
        $file = "{$this->root}library/{$name}.php";
        if (!file_exists($file))
        {
            apc_store(self::PREFIX . $name, null);
            apc_store($key, null);
            return false;
        }

        apc_store(self::PREFIX . $name, $file);
        apc_store($key, $file);
        include $file;
    }

    public function event($name)
    {
        $key    = self::PREFIX . self::PREFIX_EVENT . $name;
        $cached = apc_fetch($key);

        if ($cached === null) {
            return false;
        }
        if ($cached !== false)
        {
            apc_store(self::PREFIX . $name, $cached);
            include $cached;
            return true;
        }

        if (strncmp($name, 'events_', 7) !== 0)
        {
            apc_store(self::PREFIX . $name, null);
            apc_store($key, null);
            return false;
        }

        $name = str_replace("_", "/", $name);
        $file = "{$this->root}application/{$name}.php";
        if (!file_exists($file))
        {
            apc_store(self::PREFIX . $name, null);
            apc_store($key, null);
            return false;
        }

        apc_store(self::PREFIX . $name, $file);
        apc_store($key, $file);
        include $file;
    }

    public function driver($name)
    {
        $key    = self::PREFIX . self::PREFIX_DRIVER . $name;
        $cached = apc_fetch($key);

        if ($cached === null) {
            return false;
        }
        if ($cached !== false)
        {
            apc_store(self::PREFIX . $name, $cached);
            include $cached;
            return true;
        }

        if (strncmp($name, "driver_", 7) !== 0)
        {
            apc_store(self::PREFIX . $name, null);
            apc_store($key, null);
            return false;
        }

        $name = substr($name, 7, -5);
        $file = "{$this->root}drivers/{$name}.php";
        if (!file_exists($file))
        {
            apc_store(self::PREFIX . $name, null);
            apc_store($key, null);
            return false;
        }

        apc_store(self::PREFIX . $name, $file);
        apc_store($key, $file);
        include $file;
    }

    public static function initialize($hooks = false)
    {
        if (!isset(self::$instance))
        {
            $thisClass = __CLASS__;
            self::$instance = new $thisClass($hooks);
        }
        return self::$instance;
    }

    public function __clone()
    {
        die('Error: Can not be cloned.');
    }
}

lazyLoader::initialize();

$observer = Observer::singleton(
    array(
        'request/received' => array(
            'timer',
            'layout',
            'dispatch'
        ),
        'request/ended' => array(
            'timer',
            'layout'
        )
    )
);


$observer->trigger("request/received");

$observer->trigger("request/ended");

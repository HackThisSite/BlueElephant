<?php

/**
* Authors:
*   Thetan ( Joseph Moniz )
**/

class View
{
    private $viewPath = '';
    private $data = array();
    private $parsed;
    private $driver;

    const VIEW_PATH     = '/application/views/';
    const VIEW_EXT      = '.php';
    const VIEW_SUFFIX   = '_view';

    const CACHE_PREFIX = "viewStat:";

    const DRIVER_PREFIX      = 'driver_';
    const DRIVER_TRADITIONAL = 'traditional';

    public function __construct($viewPath, $data = array(),
                                $driver = self::DRIVER_TRADITIONAL)
    {
        $key = self::CACHE_PREFIX . Layout::getLayout() . ':' . $viewPath;
        $this->viewPath = apc_fetch($key);

        if (!$this->viewPath)
        {
            $this->viewPath = dirname(dirname(__FILE__))
                            . self::VIEW_PATH
                            . Layout::getLayout() 
                            . '/' 
                            . $viewPath 
                            . self::VIEW_EXT;

            if (!file_exists($this->viewPath))
            {
                $this->viewPath = dirname(dirname(__FILE__))
                                . self::VIEW_PATH
                                . 'main/'
                                . $viewPath 
                                . self::VIEW_EXT;
            }
            apc_store($key, $this->viewPath);
        }

        $this->driver = self::DRIVER_PREFIX . $driver . self::VIEW_SUFFIX;
        if (!class_exists($this->driver)) die('Invalid driver.');
        
        $this->data = $data;
    }

    public function __get($name)
    {
        return (isset($this->data[$name])) ? $this->data[$name] : false;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function render()
    {
        if ($this->parsed) { return $this->parsed; }

        $driver = $this->driver;

        return $this->parsed = $driver::render($this->viewPath, $this->data);
    }

    public function __toString()
    {
        return $this->render();
    }
}

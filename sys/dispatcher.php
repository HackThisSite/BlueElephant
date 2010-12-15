<?php 
/**
Copyright (c) 2010, HackThisSite.org
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:
    * Redistributions of source code must retain the above copyright
      notice, this list of conditions and the following disclaimer.
    * Redistributions in binary form must reproduce the above copyright
      notice, this list of conditions and the following disclaimer in the
      documentation and/or other materials provided with the distribution.
    * Neither the name of the HackThisSite.org nor the
      names of its contributors may be used to endorse or promote products
      derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS ``AS IS'' AND ANY
EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

/**
* Authors:
*   Thetan ( Joseph Moniz )
**/

$maind = getcwd().'/../';

set_include_path(get_include_path() . PATH_SEPARATOR . $maind.'library');

class lazyLoader
{
    private static $instance;

    private function __construct($hooks = false)
    {
        spl_autoload_register(null, false);
        spl_autoload_extensions('.php');
        spl_autoload_register(array($this, 'model'));
        // view loading is handled automatically by the view class
        spl_autoload_register(array($this, 'controller'));
        spl_autoload_register(array($this, 'library'));
        spl_autoload_register(array($this, 'hook'));
        spl_autoload_register(array($this, 'driver'));
    }
    
    public function model($name)
    {
        if ($name[0] == strtoupper($name[0]))
            return false;
        
        $main = $GLOBALS['maind'];
        $file = "{$main}application/models/{$name}.php";
        if (!file_exists($file))
            return false;
        
        include $file;
    }
    
    public function controller($name)
    {
        if (substr($name, -11) != '_controller')
            return false;
        
        $main = $GLOBALS['maind'];
        $name = substr($name, 0, -11);
        $file = "{$main}application/controllers/{$name}.php";
        if (!file_exists($file))
            return false;
        
        include $file;
    }
    
    public function library($name)
    {
        if ($name[0] != strtoupper($name[0]))
            return false;
        
        $name = strtolower($name);
        $main = $GLOBALS['maind'];
        $file = "{$main}library/{$name}.php";
        if (!file_exists($file))
            return false;
            
        include $file;
    }
    
    public function hook($name)
    {
        if (substr($name, -5) != '_hook')
            return false;
        
        $main = $GLOBALS['maind'];
        $name = substr($name, 0, -5);
        $file = "{$main}application/hooks/{$name}.php";
        if (!file_exists($file))
            return false;
        
        include $file;
    }
    
    public function driver($name)
    {
        if (substr($name, -7) != '_driver')
            return false;
            
        list($name, $type) = explode('_', $name);
        
        $main = $GLOBALS['maind'];
        $file = "{$main}drivers/{$type}/{$name}.php";
        if (!file_exists($file))
            return false;
        
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

$hooks = HookHandler::singleton(
    array(
        'ini' => array(
            'config',
            'timer',
            'layout',
            'dispatch'
        ),
        'end' => array(
            'layout_parse',
        )
    )
);

// proccess request string
if (!$_GET['r']) $_GET['r'] = 'index/index';
$request = explode('/', $_GET['r']);
$controller = array_shift($request);

dispatch($controller, $request, false, true);

$hooks->runHooks('end');

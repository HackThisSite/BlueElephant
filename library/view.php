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

class View
{
    private $viewPath = '';
    private $data = array();
    private $parsed;
    
    const VIEW_PATH = 'application/views/';
    const VIEW_EXT = '.php';
    const DRIVER_SUFFIX = '_view_driver';
    
    public function __construct($viewPath, $data = false, $driver = 'traditional')
    {
        
        $this->viewPath = $GLOBALS['maind'];
        $this->viewPath .= self::VIEW_PATH;
        $this->viewPath .= $viewPath;
        $this->viewPath .= self::VIEW_EXT;
        
        $this->driver = $driver . self::DRIVER_SUFFIX;
        
        // If view data is supplied as an array, merge it with the view data.
        // We merge instead of set because the constructor may be called by
        // the __invoke() magical routine.
        if (is_array($data))  $this->data = array_merge($this->data, $data);
    }
    
    // Wrapper for getting view variables
    public function __get($name)
    {
        return (isset($this->data[$name])) ? $this->data[$name] : false;
    }

    // Wrapper for setting view variables
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    // This function does the heavy lifting for the view.
    public function parse()
    {
        if ($this->parsed) return $this->parsed;
        
        $v = $this->driver;
        $driver = new $v();
        $this->parsed = $driver->parse($this->viewPath, $this->data);
        
        return $this->parsed;
        
    }
    
    /*
    * This function gets 'invoked' automagically when an object
    * of type view is called as if it were a function. The expected
    * result is to load the array $data into the view, parse the views
    * display logic and return the results.
    * It's syntactic sugar for loading an array worth of data into the 
    * view and parsing it.
    */
    public function __invoke($data = false)
    {
        if (is_array($data)) $this->__construct($this->viewPath, $data);
        return $this->parse();
    }
    
    public function __toString()
    {
        return $this->parse();
    }
}
?>

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
*   Bren2010 ( Brendan Mc. )
**/


$maind = getcwd().'/../';

// Create the autoload function that will lazily load
// libraries, models and views
set_include_path(get_include_path() . PATH_SEPARATOR . $maind.'library');
function __autoload($class_name)
{
	global $maind;
	
	if ($class_name[0] == strtoupper($class_name[0]))
	{
        if (strpos($class_name, 'Zend') === 0)
        {
            require_once str_replace('_', '/', $class_name).'.php';
        }
        else
        {
            $class_name = strtolower($class_name);
            if (file_exists($maind.'library/'.$class_name.'.php'))
                require_once $class_name.'.php';
        }
	}
	else if (substr($class_name, -11) == '_controller')
	{
	    $class_name = substr($class_name, 0, -11);
		if (file_exists($maind.'application/controllers/'.$class_name.'.php'))
			require_once $maind.'application/controllers/'.$class_name.'.php';
	}
    else if (substr($class_name, -5) == '_hook')
	{
	    $class_name = substr($class_name, 0, -5);
		if (file_exists($maind.'application/hooks/'.$class_name.'.php'))
			require_once $maind.'application/hooks/'.$class_name.'.php';
	}
    else if (substr($class_name, -7) == '_driver')
	{
	    list($class_name, $type) = explode('_', $class_name);
		if (file_exists($maind.'drivers/'.$type.'/'.$class_name.'.php'))
			require_once $maind.'drivers/'.$type.'/'.$class_name.'.php';
	}
	else
	{
		if (file_exists($maind.'application/models/'.$class_name.'.php'))
			require_once $maind.'application/models/'.$class_name.'.php';
	}
}

$hooks = HookHandler::singleton(
    array(
        'ini' => array(
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

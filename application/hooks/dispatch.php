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

class dispatch_hook
{
    public function __construct()
    {
        function dispatch($controller, $request = false, $viewData = false, $standAlone = false)
        {
            $controller .= '_controller';
            if (class_exists($controller))
            {
                if (empty($request[0])) $request = array(0 => "index");
                if (!method_exists($controller, $request[0])) $request = array_merge(array(0 => 'index'), $request);
                
                $state = new $controller($request);
                $GLOBALS['errors'] = $state->getErrors();
                
                if (!$standAlone)
                   return $state->getResult();
                   
                echo $state->getResult();
                
                if ($state->getDriver() != 'traditional') exit();
            }
            else
            {
                include_once("./../application/errors/404.php");
            }
        }
    }
}

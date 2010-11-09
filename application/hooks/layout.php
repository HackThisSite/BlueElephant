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

class layout_hook
{
    public function __construct()
    {
        /*
        * Store user selected theme in the DB, pull it from the DB on auth
        * and store it in a session var, otherwise don't use it at all <3
        */
        /*
        // if the template configuration file is set load it and establish a
        // layout instance
        $customThemeLoaded = FALSE; // << Added that so I could stop using constant if-else statements

        if (!empty($_COOKIE['theme'])) { // Only load if another theme is defined.
            $theme = trim($_COOKIE['theme']);
            
            if (ctype_alnum($theme)) { // No funky biz.  Only alnum in theme titles.
                if (file_exists($maind . 'application/layouts/' . $theme . '.php')) {
                    $layout = new Layout($maind . 'application/layouts/' . $theme . '.php');
                    $customThemeLoaded = TRUE;
                    
                    // Establish style and image folder urls
                    $stylesheetUrl = $config->site->baseURL . "application/style/" . $theme . "/";
                    $imagesUrl = $config->site->baseURL . "application/style/" . $theme . "/images/";
                } // else: 1337 H4X04 used made up, but standard conforming name =/
            } // else: 1337 H4X0r prbly tried to use . lolwut
        }
        */

        //if ($customThemeLoaded == FALSE) {
        $GLOBALS['layout'] = new Layout(
            $GLOBALS['maind'].'application/layouts/'.$GLOBALS['config']->layout->template
        );
        $GLOBALS['stylesheetUrl'] = '/hts/application/style/main/';
        $GLOBALS['imagesUrl'] = '/hts/application/style/main/images/';
        //}

        $GLOBALS['mainImagesUrl'] = '/hts/application/images/';
    }
}

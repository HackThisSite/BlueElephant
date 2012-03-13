<?php

class controller_index extends Controller
{
    public function index($arguments)
    {
        $this->view['world'] = 'World';
    }
    
}

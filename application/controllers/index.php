<?php

class index_controller extends Controller
{
    public function index($arguments)
    {
        $this->view['world'] = 'World';
    }
    
}

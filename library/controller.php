<?php 
/**
* Authors:
*   Thetan ( Joseph Moniz )
**/

class Controller
{
    protected $view = array();
    protected $cacheKey = false;
    protected $cacheHit = false;
    protected $parsedViewResult;
    protected $request;
    private $controllerState = array('viewPath' => '',
                                     'viewClass' => '',
                                     'errors' => array()
                                    );
    // class wide error messages
    const E_404 = "404";
    
    public function __construct($request, $viewData = 0, $silent = 0)
    {  
        if (is_array($viewData)) $this->view = $viewData;
        
        // The setting of $silent to non zero will allow us to 
        // initialize a controller object without implicitly calling
        // a controller method, this is done by returning immediately.
        $this->request = $request;
        if ($silent) return;    
        
        $this->processRequest();    
    }
    
    public function processRequest()
    {
        // Pull view driver from extension
        $extension = explode('.', end($this->request));
        if (count($extension) == 2)
        {
            $this->driver = $extension[1];
            array_pop($this->request);
            $this->request[] = $extension[0];
        }
        else
        {
            $this->driver = 'traditional';
        }
        
        // If no method was specified default to index
        $method = (isset($this->request[0])) ? 
                                             array_shift($this->request) 
                                             : 'index';

        $this->__call($method, $this->request);
    }
    
    public function __call($name, $arguments)
    { 
        // Return with false if the controller method doesn't exist.
        if (!method_exists($this, $name))
            return $this->setError('No such method:'.$name);

        $controller = substr(get_class($this), 11);
        // Set the implicit view
        $this->setView($controller.'_'.$name);
        
        // Call the actual function.
        $this->$name($arguments);
        
        // Load and parse view
        $this->parsedViewResult = new View(
            $this->controllerState['view'], 
            $this->view,
            $this->driver
        );

        return $this->parsedViewResult;

    }

    public static function __callStatic($name, $arguments)
    {
    //  !!!!!!!!!!!!!!!!!!! FINISH ME!!!!!!!!!!!!!!
    }
    
    public function getResult()
    {
        return $this->parsedViewResult;
    }
    
    public function setView($view)
    {
        $this->controllerState['view'] = $view;
    }
    
    public function isError()
    {
        return (bool) count($this->controllerState['errors']);
    }
    
    public function getErrors()
    {
        return $this->controllerState['errors'];
    }
    
    public function getDriver()
    {
        return $this->driver;
    }
    
    protected function setError($error)
    {
        $this->controllerState['errors'][] = $error;
        return false;
    }
    
    protected function setCache($key)
    {
        $this->cacheKey = $key;
    }
}
?>

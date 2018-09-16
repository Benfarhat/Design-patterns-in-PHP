<?php
namespace App;

use App\FrontControllerInterface;

class FrontController implements FrontControllerInterface
{
    const NS_CONTROLLER =  __NAMESPACE__ . '\\Controller\\';
    const DEFAULT_CONTROLLER = "DefaultController";
    const DEFAULT_ACTION     = "notFound";
    
    protected $controller    = self::DEFAULT_CONTROLLER;
    protected $action        = self::DEFAULT_ACTION;
    protected $params        = array();
    protected $basePath      = "/";

    public function __construct() {
        $this->parseURI();
    }
    private function parseURI()
    {
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        $path = preg_replace('/[^a-zA-Z0-9]\//', "", $path);
        if (strpos($path, $this->basePath) === 0) {
            $path = substr($path, strlen($this->basePath));
        }
        @list($controller, $action, $params) = explode("/", $path, 3);
        if (isset($controller)) {
            $this->setController($controller);
        }
        if (isset($action)) {
            $this->setAction($action);
        }
        if (isset($params)) {
            $this->setParams(explode("/", $params));
        }
    }
    
    public function setController($controller) {
        $controller = ucfirst(strtolower($controller)) . "Controller";
        if (!class_exists(self::NS_CONTROLLER . $controller)) {
            $controller = self::DEFAULT_CONTROLLER;
        }
        $this->controller = self::NS_CONTROLLER . $controller;
        return $this;
    }
    
    public function setAction($action) {
        $reflector = new \ReflectionClass($this->controller);
        if (class_exists($this->controller) && !$reflector->hasMethod($action)) {
            $this->controller = self::NS_CONTROLLER . self::DEFAULT_CONTROLLER;
            $action = self::DEFAULT_ACTION;
        }
        
        $this->action = $action;
        return $this;
    }
    
    public function setParams(array $params) {
        $this->params = $params;
        return $this;
    }
    
    public function run() {
        call_user_func_array(array(new $this->controller, $this->action), $this->params);

    }

}
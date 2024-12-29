<?php

class App {

    protected $controller;
    protected $method;
    protected $params = [];
    
    public function __construct() {

        $url = $this->parseURL();
        
        $this->controller = $this->getController($url);
        unset($url[0]);

        require_once "../app/controllers/$this->controller.php";

        $this->controller = new $this->controller();

        $this->method = $this->getMethod($this->controller, $url);
        unset($url[1]);

        if( $this->method == 'notfound' ) {
            require_once "../app/controllers/ErrorURL.php";
            $this->controller = new ErrorURL();
        }

        $this->params = isset($url) ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);

    }
    
    public function parseURL() {

        if ( isset($_GET['url']) ) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }

    }

    public function getController($url) {

        $controller = isset($url[0]) ? ucfirst($url[0]) : 'Home';

        return file_exists( "../app/controllers/$controller.php" ) ? $controller : 'ErrorURL';

    }

    public function getMethod($controller, $url) {

        $method = isset($url[1]) ? ($url[1]) : 'index';

        return method_exists( $controller, $method ) ? $method : 'notfound';

    }

}
<?php

class Router {
    private $routes = [];

    public function add($path, $controller) {
        $this->routes[$path] = $controller;
    }

    public function dispatch($url) {
        session_start();
        
        $path = parse_url($url, PHP_URL_PATH);
        if (empty($path)) $path = '/';

        if (isset($this->routes[$path])) {
            $controllerFile = BASE_PATH . "/controllers/{$this->routes[$path]}.php";
            if (file_exists($controllerFile)) {
                require_once $controllerFile;
            } else {
                require BASE_PATH . '/views/404.php';
            }
        } else {
            require BASE_PATH . '/views/404.php';
        }
    }
}
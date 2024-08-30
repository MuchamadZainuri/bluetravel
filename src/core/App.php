<?php

namespace MyApp\Core;

class App
{
    private $controllerFile = 'HomeController';
    private $controllerMethod = 'index';
    private $namespace = 'MyApp\Controllers';
    private $parameter = [];

    private const DEFAULT_GET = 'GET';
    private const DEFAULT_POST = 'POST';
    private const DEFAULT_PUT = 'PUT';
    private const DEFAULT_DELETE = 'DELETE';
    private const DEFAULT_PATCH = 'PATCH';
    private $handlers = [];

    public function setDefaultController($controller)
    {
        $this->controllerFile = $controller;
    }

    public function setDefaultMethod($method)
    {
        $this->controllerMethod = $method;
    }

    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }

    private function setHandler(string $method, string $path, $handler)
    {
        $this->handlers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler
        ];
    }

    public function get($uri, $callback)
    {
        $this->setHandler(self::DEFAULT_GET, $uri, $callback);
    }

    public function post($uri, $callback)
    {
        $this->setHandler(self::DEFAULT_POST, $uri, $callback);
    }

    public function put($uri, $callback)
    {
        $this->setHandler(self::DEFAULT_PUT, $uri, $callback);
    }

    public function patch($uri, $callback)
    {
        $this->setHandler(self::DEFAULT_PATCH, $uri, $callback);
    }

    public function delete($uri, $callback)
    {
        $this->setHandler(self::DEFAULT_DELETE, $uri, $callback);
    }

    public function run()
    {
        $executed = false;
        $url = $this->getUrl();
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->handlers as $handler) {
            $path = explode('/', rtrim(ltrim($handler['path'], '/'), '/'));
            $new_path = [];
            $new_url = [];
            $param = [];
            $paramURL = [];
            $objVariable = [];
            if (count($path) == count($url)) {
                foreach ($path as $value) {
                    if (!str_contains($value, ':')) {
                        array_push($new_path, $value);
                    } else {
                        array_push($param, str_replace(')', '', str_replace('(', '', str_replace(':', '', $value))));
                    }
                }

                if (str_contains(implode("/", $url), implode("/", $new_path))) {

                    for ($i = 0; $i < count($url); $i++) {
                        if ($i < count($new_path)) {
                            array_push($new_url, $url[$i]);
                        } else {
                            array_push($paramURL, $url[$i]);
                        }
                    }

                    if (implode("/", $new_path) == implode("/", $new_url) && count($param) == count($paramURL) && $requestMethod == $handler['method']) {
                        for ($i = 0; $i < count($param); $i++) {
                            if (str_contains(implode('/', $param), 'segment')) {
                                $objVariable[] = $paramURL[$i];
                            } else {
                                $objVariable[$param[$i]] = $paramURL[$i];
                            }
                        }

                        if (isset($handler['handler'][0]) && class_exists($this->namespace . '\\' . $handler['handler'][0])) {
                            $this->controllerFile = $handler['handler'][0];
                        }
                        // create objeknya
                        $fn = $this->namespace . '\\' . $this->controllerFile;
                        $this->controllerFile = new $fn();
                        // $this->controllerFile = new $this->controllerFile;
                        $executed = true;
                        if (isset($handler['handler'][1]) && method_exists($this->controllerFile, $handler['handler'][1])) {
                            $this->controllerMethod = $handler['handler'][1];
                        }
                        // $url = $paramURL;
                        $url = $objVariable;
                    }
                }
            }
        }

        if ($executed == false) {
            $fn = $this->namespace . '\\' . $this->controllerFile;
            $this->controllerFile = new $fn();
        }

        if (!empty($url)) {
            $this->parameter = $url;
        }

        call_user_func_array([$this->controllerFile, $this->controllerMethod], $this->parameter);
    }

    private function getUrl()
    {
        $url = rtrim($_SERVER['QUERY_STRING'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
    }
}

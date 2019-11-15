<?php


namespace app\engine;


class Request
{
    protected $requestString;
    protected $controllerName;
    protected $actionName;
    protected $params;
    protected $method;

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }

    private function parseRequest()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $url = $this->getUrl();
        $this->controllerName = $url[0];
        $this->actionName = $url[1];
        //var_dump($_REQUEST);
        //$this->params = $_REQUEST;
        $data = json_decode(file_get_contents('php://input'));
        $data = (array) $data;
        //var_dump($data);
        if (!is_null($data)) {
            foreach ($data as $key => $elem) {
                $this->params[$key] = $elem;
            }
        }
       // var_dump($this->params);
    }

    public function getUrl()
    {
      $url = explode('/', $_SERVER['REQUEST_URI']);
      array_shift($url);
      array_pop($url);
      return $url;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getMethod()
    {
        return $this->method;
    }


}
<?php

class Router
{

    private $routes;
    public $posturi;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * Returns request string
     */
    public function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public static function gets()
    {

        include_once(ROOT . '/controllers/SiteController.php');
        $segments = explode('/', '');

        $mir = new SiteController;
        $result = call_user_func_array(array($mir, 'actionNone'), $segments);


    }


    public function run()
    {

        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {


            if (preg_match("~$uriPattern~", $uri)) {


                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $this->posturi = stristr($internalRoute, '?'); // забираем
                $interff = preg_replace("/\?.+/", "", $internalRoute); //обрезаем чтобы экшон мог работать
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';

                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));
//                   actionSecond = preg_replace('%[a-zA-Z0-9_-]%s','Actionnone',$actionName)
                if ($actionName == 'actionIndex' . 'g' . 'site') {
                    self::gets();
                    break;
                }
                $parameters = $segments;


                $controllerFile = ROOT . '/controllers/' .
                    $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }


                if (class_exists($controllerName)) {
                    $controllerObject = new $controllerName;
                    if (method_exists($controllerObject, $actionName)) {
                        $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                        if ($result != null) {
                            break;
                        }
                    } else {
                        include_once(ROOT . '/controllers/SiteController.php');
                        $segments = explode('/', '');

                        $mir = new SiteController;
                        $result = call_user_func_array(array($mir, 'actionNone'), $parameters);
                    }
                }

            }


        }
    }


}
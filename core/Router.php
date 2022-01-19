<?php
    namespace  app\core;
    use app\core\Request;
    use app\controllers\SiteController;
    use app\controllers\ReservationController;

    class Router
    {
        protected $routes = [];
        public $request;
        public $response;

        /**
         * @param $request
         * @param $response
         */
        public function __construct($request, $response)
        {
            $this->request = $request;
            $this->response = $response;
        }


        public function get($path, $callback) {
            $this->routes['get'][$path] = $callback;
        }

        public function post($path, $callback) {
            $this->routes['post'][$path] = $callback;
        }

        public function resolve()
        {
            $path = $this->request->getPath();
            $method = $this->request->method();
            $callback = isset($this->routes[$method][$path]) ? $this->routes[$method][$path] : false;
            if ($callback === false) {
                $this->response->setStatusCode(404);
                return $this->renderView('_404', $params = []);
            }
            if (is_string($callback)) {
                return $this->renderView($callback, $params = []);
            }
            if(is_array($callback)){
                Application::$app->controller = new $callback[0]();
                $callback[0] = Application::$app->controller;
            }
            return call_user_func($callback, $this->request, $this->response);
        }

        public function  renderView($view, $params) {
            $layoutContent = $this->layoutContent();
            $viewContent = $this->renderOnlyView($view, $params);
            return str_replace('{{content}}', $viewContent, $layoutContent);
        }

        protected function layoutContent()
        {
            $layout = Application::$app->controller->layout;
            ob_start();
            include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
            return ob_get_clean();
        }

        protected  function renderOnlyView($view, $params) {
            foreach ($params as $key => $value) {
                $$key = $value; //$$key je $názevid
            }
            ob_start();
            include_once Application::$ROOT_DIR."/views/$view.php";
            return ob_get_clean();
        }
    }
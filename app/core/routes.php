<?php
/*
   Mapear la URL ingresada en el navegador,
   1 - controlador
   2 - método
   3 - parámetro
   Ej: /articulos/editar/4
*/

class Routes {
    protected $actualController = 'Pages';  // Controlador por defecto (Landing page)
    protected $actualMethod = 'index';      // Método por defecto
    protected $params = [];

    public function __construct() {
        $url = $this->getUrl();

        // Verificar si hay controlador en la URL
        if (isset($url[0])) {
            $controllerName = ucwords($url[0]);
            if (file_exists('../app/controllers/' . $controllerName . '.php')) {
                $this->actualController = $controllerName;
                unset($url[0]);
            } else {
                $this->errorPage('Controlador no encontrado.');
                return;
            }
        }

        // Requiere el controlador
        require_once '../app/controllers/' . $this->actualController . '.php';
        $this->actualController = new $this->actualController;

        // Verificar si hay método en la URL
        if (isset($url[1])) {
            $methodName = $url[1];
            if (method_exists($this->actualController, $methodName)) {
                $this->actualMethod = $methodName;
                unset($url[1]);
            } else {
                $this->errorPage('Método no encontrado.');
                return;
            }
        }

        // Obtener parámetros
        $this->params = $url ? array_values($url) : [];

        // Llamar al método del controlador con los parámetros
        call_user_func_array([$this->actualController, $this->actualMethod], $this->params);
    }

    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }

    private function errorPage($message) {
        echo "<h1>Error: $message</h1>";
        exit;
    }
}
?>
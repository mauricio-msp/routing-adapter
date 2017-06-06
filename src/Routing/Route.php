<?php

namespace Src\Routing;


class Route extends \Klein\Klein {
    
    
    /**
     * -------------------------------------------------------------------------
     * Rota Adaptada
     * -------------------------------------------------------------------------
     * 
     * Essa função cria uma rota que pode ser dos tipos: GET|POST|PUT|DELETE.
     * Verifica também se o 3º parâmetro é do tipo string class->method(), uma
     * classe instanciada com chamada de método. Caso não seja ele interpreta o 
     * padrão que é uma function. 
     * 
     * @param type $method
     * @param type $path
     * @param type $callback
     */
    
    public function map($method, $path = '*', $callback = NULL){
        if(is_string($callback)):
            
            $params     = explode('@', $callback);
            $controller = /* App\\Controllers\\  . */ $params[0];
            $action     = $params[1];
            
            $this->respond($method, $path, function($request, $response, $app) use ($controller, $action){
                $controller = new $controller();
                $controller->loader($request, $response, $app);
                return $controller->$action();
            });
        else:
            $this->respond($method, $path, $callback);
        endif;
    }
    
}

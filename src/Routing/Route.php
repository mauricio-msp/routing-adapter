<?php

namespace Src\Routing;


class Route extends \Klein\Klein {
    
    
    /**
     * -------------------------------------------------------------------------
     * Rotas Adaptadas
     * -------------------------------------------------------------------------
     * 
     * Rotas que podem ser dos tipos: GET|POST|PUT|DELETE.
     * Verifica também se o 2º parâmetro é do tipo string class->method(), uma
     * classe instanciada com chamada de método. Caso não seja ele interpreta o 
     * padrão que é uma function(){}. 
     * 
     * @param type $path
     * @param type $callback
     */
    
    
    public function get($path = '*', $callback = NULL){
        if(is_string($callback)):
            
            $params     = explode('@', $callback);
            $controller = /* App\\Controllers\\  . */ $params[0];
            $action     = $params[1];
            
            $this->respond('GET', $path, function($request, $response, $app) use ($controller, $action){
                $controller = new $controller();
                $controller->loader($request, $response, $app);
                return $controller->$action();
            });
        else:
            $this->respond('GET', $path, $callback);
        endif;
    }
    
    
    public function post($path = '*', $callback = NULL){
        if(is_string($callback)):
            
            $params     = explode('@', $callback);
            $controller = /* App\\Controllers\\  . */ $params[0];
            $action     = $params[1];
            
            $this->respond('POST', $path, function($request, $response, $app) use ($controller, $action){
                $controller = new $controller();
                $controller->loader($request, $response, $app);
                return $controller->$action();
            });
        else:
            $this->respond('POST', $path, $callback);
        endif;
    }
    
    
    public function put($path = '*', $callback = NULL){
        if(is_string($callback)):
            
            $params     = explode('@', $callback);
            $controller = /* App\\Controllers\\  . */ $params[0];
            $action     = $params[1];
            
            $this->respond('PUT', $path, function($request, $response, $app) use ($controller, $action){
                $controller = new $controller();
                $controller->loader($request, $response, $app);
                return $controller->$action();
            });
        else:
            $this->respond('PUT', $path, $callback);
        endif;
    }
    
    
    public function delete($path = '*', $callback = NULL){
        if(is_string($callback)):
            
            $params     = explode('@', $callback);
            $controller = /* App\\Controllers\\  . */ $params[0];
            $action     = $params[1];
            
            $this->respond('DELETE', $path, function($request, $response, $app) use ($controller, $action){
                $controller = new $controller();
                $controller->loader($request, $response, $app);
                return $controller->$action();
            });
        else:
            $this->respond('DELETE', $path, $callback);
        endif;
    }
    
}

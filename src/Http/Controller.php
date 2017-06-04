<?php

namespace Src\Http;


abstract class Controller {
    
    /**
     * @var type protected 
     */
    
    protected $request;
    
    /**
     * @var type protected
     */
    
    protected $response;
    
    /**
     * @var type protected 
     */
    
    protected $service;
    
    /**
     * @var type protected
     */
    
    protected $app;
    
    
    /**
     * -------------------------------------------------------------------------
     * Carregador
     * -------------------------------------------------------------------------
     * 
     * Irá carregar as variáveis padrão Klein para que possa ser utilizada em
     * classe que serão criadas no diretório /controllers.
     * 
     * 
     * @param type $request
     * @param type $response
     * @param type $app
     */
    
    public function loader($request, $response, $app) {
        
        // Requisição
        $this->request  = $request;
        
        // Resposta
        $this->response = $response;
        
        // Serviços
        $this->service  = new View($request, $response, $app);
        
        // App
        $this->app      = $app;
    }
    
}

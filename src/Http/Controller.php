<?php

namespace Src\Http;


class Controller {
    
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
     * Responsável pelo carregamento das variáveis padrão do Klein, para que 
     * possam ser utilizadas nas classes criadas no diretório /controllers
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

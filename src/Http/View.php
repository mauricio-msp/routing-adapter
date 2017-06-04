<?php

namespace Src\Http;


class View {
    
    /**
     * @var type private 
     */
    
    private $loader;
    
    /**
     * @var type private
     */
    
    private $twig;
    
    
    /**
     * -------------------------------------------------------------------------
     * Renderizar páginas usando TWIG
     * -------------------------------------------------------------------------
     * 
     * Twig é um motor de template para a linguagem de programação PHP. 
     * 
     * @param type $view
     * @param array $data
     * @return type
     */
    
    public function render($view, array $data = []) {
        $this->loader = new \Twig_Loader_Filesystem(/* diretório view */);
        $this->twig   = new \Twig_Environment($this->loader);
        
        return $this->twig->render($view, $data);
    }
}

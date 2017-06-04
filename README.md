# Sobre o controller-route

### Uma aplicação que adapta modo de chamada da(s) rota(s) 

controller-route é uma aplicação que adpata a chamada de função em sua(s) rota(s) usando o [Klein.php](https://github.com/klein/klein.php), além de renderizar as páginas usando o [Twig Template](https://twig.sensiolabs.org).


# Instalação

É recomendável que você use o [Composer](https://getcomposer.org) para instalar o controller-route.

```
$ composer require mauricio-msp/controller-route
```

O controller-route vai instalar todas as dependências necessárias, como: 

- Klein.php (is a fast & flexible router for PHP 5.3+)
- Twig Template (Twig, the flexible, fast, and secure template language for PHP )

# Exemplo

###### index.php

``` php
<?php

  require __DIR__ . '/vendor/autoload.php';
  
  $klein = new \Src\Routing\Route();
  
  $klein->map('GET', '/', 'IndexController@action');
  
  $klein->dispatch();
```

# Antes de usar

No arquivo View.php dentro do diretório src/Http, deve fazer a seguinte alteração.

``` php
<?php
    
    // Como está
    public function render($view, array $data = []) {
        $this->loader = new \Twig_Loader_Filesystem(/* diretório view */);
        $this->twig   = new \Twig_Environment($this->loader);
        
        return $this->twig->render($view, $data);
    }
    
    // Como deve por exemplo
     public function render($view, array $data = []) {
        $this->loader = new \Twig_Loader_Filesystem(__DIR__ . '/views/');
        $this->twig   = new \Twig_Environment($this->loader);
        
        return $this->twig->render($view, $data);
    }
```
Você deve alterar o caminho para o diretório onde vai conter suas views ou páginas.

***

Após isso, no arquivo Route.php dentro do diretório src/Routing, deve fazer a seguinte alteração.

``` php
<?php
    // Linha 28
    $controller = /* App\\Controllers\\  . */ $params[0];
    
    // Exemplo
    $controller = 'App\\Controllers\\'  .  $params[0];
```

Configurar de acordo com os namespace da sua aplicação

# Licença

O simple-php é uma aplicação open-source licenciado sob a [licença MIT](https://opensource.org/licenses/MIT).

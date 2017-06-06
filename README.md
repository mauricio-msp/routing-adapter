![logo-routing github](https://cloud.githubusercontent.com/assets/13602785/26808092/eaeb8d4c-4a30-11e7-892c-6de716534eb0.png)


# Sobre a aplicação

### Uma aplicação que adapta modo de chamada da(s) rota(s) 

É uma aplicação que adapta a chamada de função em sua(s) rota(s) usando o [klein.php](https://github.com/klein/klein.php), além de renderizar as páginas usando o [Twig Template](https://twig.sensiolabs.org).

# Melhor entendimento

Veja antes como funciona o gerenciador de rotas [klein.php](https://github.com/klein/klein.php) e suas configurações e como funciona a engine [Twig Template](https://twig.sensiolabs.org) (renderizador de páginas). Após a compreensão, poderá utilizar o routing tranquilamente.

# Instalação

É recomendável que você use o [Composer](https://getcomposer.org) para instalar o routing.

```
$ composer require mauricio-msp/routing
```

O routing vai instalar todas as dependências necessárias, como: 

- klein.php (is a fast & flexible router for PHP 5.3+)
- Twig Template (Twig, the flexible, fast, and secure template language for PHP )

# Exemplo

###### index.php

``` php
<?php

  require __DIR__ . '/vendor/autoload.php';
  
  $route = new \Src\Routing\Route();
  
  $route->get('/', 'IndexController@action');
  
  $route->dispatch();
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

# Tipos de rotas

``` php
<?php

  $route->get('/posts', $callback);
  $route->post('/posts', $callback);
  $route->put('/posts/[i:id]', $callback);
  $route->delete('/posts/[i:id]', $callback);
```

# Licença

O routing é uma aplicação open-source licenciado sob a [licença MIT](https://opensource.org/licenses/MIT).

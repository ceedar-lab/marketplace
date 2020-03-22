<?php
namespace App;

class Router {

    protected $viewPath;
    protected $router;

    public function __construct(string $viewPath = null) {
        $this->viewPath = $viewPath;
        $this->router = new \AltoRouter();
    }

    public function get(string $url, string $view, ?string $name = null): self {
        $this->router->map('GET', $url, $view, $name);
        return $this;
    }

    public function url(string $name, ?array $params = []): string {
        return $this->router->generate($name, $params);
        
    }

    public function run(): self {
        $match = $this->router->match();
        $view = $match['target'];        
        $router = $this;
        ob_start();
        require $this->viewPath . DIRECTORY_SEPARATOR . $view;
        $bodyContent = ob_get_clean();
        require $this->viewPath . DIRECTORY_SEPARATOR . 'default.php';
        return $this;
    }
}
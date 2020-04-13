<?php
namespace App\HTML;
use Core\Router;

class AccountMenu {

    public function __construct($view, $title) {
        $router = new Router();
        echo '<a href="';
        $router->url('account', $view);
        echo '"><strong>' .$title. '</strong></a>';
        echo '<img class="-small" src="'.IMAGES.DS.'icon_separator_horizontal.png" alt"separateur">';
    }
}
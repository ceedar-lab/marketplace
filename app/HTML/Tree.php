<?php
namespace App\HTML;

/**
 * Constuit la barre 'arborescence' qui se trouve sous le menu de navigation
 */
class tree {

    public function __construct(string $view, string $sub1=null, string $sub2=null) {
        echo 
        '<div class="mainFrame__treeBloc">
            <img src="'.IMAGES.DS.'icon_'.$view.'.png" alt="login icon">
            <img src="'.IMAGES.DS.'icon_separator.png" alt="/">
            <p>'.ucfirst($view).'</p>
            <img src="'.IMAGES.DS.'icon_separator.png" alt="/">';
        if ($sub1 !== null) { echo
            '<p>'.ucfirst($sub1).'</p>
            <img src="'.IMAGES.DS.'icon_separator.png" alt="/">';
        }
        if ($sub2 !== null) { echo
            '<p>'.ucfirst($sub2).'</p>
            <img src="'.IMAGES.DS.'icon_separator.png" alt="/">';
        }
        echo            
            '<img src="'.IMAGES.DS.'icon_tree.png" alt="tree icon">
        </div>';
    }
}
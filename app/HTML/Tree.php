<?php
namespace App\HTML;

/**
 * Constuit la barre 'arborescence' qui se trouve sous le menu de navigation
 */
class Tree {

    public function __construct(string $trunk, string ...$branch) {
        echo 
        '<div class="b-tree">
            <img src="'.IMAGES.DS.'icon_'.$trunk.'.png" alt="login icon">
            <img src="'.IMAGES.DS.'icon_separator.png" alt="/">
            <p>'.ucfirst($trunk).'</p>
            <img src="'.IMAGES.DS.'icon_separator.png" alt="/">';
        if ($branch !== null) { 
            foreach ($branch as $k) { echo
                '<p>'.ucfirst($k).'</p>
                <img src="'.IMAGES.DS.'icon_separator.png" alt="/">';
            }
        }
        echo '<img src="'.IMAGES.DS.'icon_tree.png" alt="tree icon">
        </div>';
    }
}
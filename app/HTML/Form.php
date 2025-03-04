<?php
namespace App\HTML;

/**
 * Construit les différents 'input' des formulaires
 */
class Form {

    public function text($name, $label=null, $id=null, $placeholder=null, $type_option = null, $class = null) {
        $type = ($type_option === null) ? 'text' : $type_option;
        echo '<div class="-text">';
        echo ($label !== null) ? '<label for="' .$id. '">' .$label. '</label>' : '';
        echo '<input type="' .$type. '" name="' .$name. '"';
        echo ($id !== null) ? ' id="' .$id. '"' : ' ';
        echo ($placeholder !== null) ? ' placeholder="' .$placeholder. '"' : ' ';
        echo ($class !== null) ? ' class="' .$class. '"' : ' ';
        echo '></div>';
    }

    public function select($name, $label = null, $id = null, $optgroup = [], bool $assoc_array = false, $class = null) {
        echo '<div class="-select">';
        echo ($label !== null) ? '<label for="' .$id. '">' .$label. '</label>' : '';
        echo '<select';
        echo ($class !== null) ? ' class="' .$class. '"' : ' ';
        echo ($id !== null) ? ' id="' .$id. '"' : ' ';
        echo 'name="' .$name. '" >';
        if ($assoc_array === false) {
            foreach ($optgroup as $k) {
                echo '<option value="' .$k. '">' .$k. '</option>';
            }
            echo '</select></div>';
        } else {
            echo '</select></div>';
            foreach ($optgroup as $country => $arr) {
                echo '<optgroup label="' .$country. '">' .$country. '</optgroup>';
                foreach ($arr as $city) {
                    echo '<option value="' .$city. '">' .$city. '</option>';
                }
                echo '</optgroup>';
            }
            echo '</select></div>';
        }
    }

    public function checkbox($name, $legend = null, $id_value = [], $class = null) {
        echo '<div class="-checkbox">';
        echo ($legend !== null) ? '<legend>' .$legend. '</legend>' : '';
        foreach ($id_value as $id => $value) {
            echo '<label for="' .$id. '">' .ucfirst($value). '</label>';
            echo '<input type="checkbox" name="' .$name. '" id="' .$id. '" value="' .$value. '" >';
        }
        echo '</div>';
    }

    public function textarea($name, $label, $id = null, $placeholder = null, $rows = null, $cols = null, $class = null) {
        echo '<div class="-textarea">';
        echo ($label !== null) ? '<label for="' .$id. '">' .$label. '</label>' : '';
        echo '<textarea name="' .$name. '" ';
        echo ($id !== null) ? ' id="' .$id. '"' : ' ';
        echo ($placeholder !== null) ? 'placeholder="' .$placeholder. '" ' : '' ;
        echo ($rows !== null) ? 'rows=' .$rows. ' ' : '';
        echo ($cols !== null) ? 'cols=' .$cols. ' ' : '';
        echo ($class !== null) ? ' class="' .$class. '"' : ' ';
        echo '></textarea></div>';
    }

    public function submit($value) {
        echo '<div><input type="submit" value="' .$value. '" ></div>';
    }
}
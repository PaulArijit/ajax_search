<?php

if (!function_exists('pr')) {

    function pr($arr, $die = true) {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';

        if ($die)
            die;
    }

}

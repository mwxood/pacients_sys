<?php
    function classAutoLoader($class) {
        $class = strtolower($class);
        $the_path = "includes/{$class}.php";

        if(is_file($the_path) && !class_exists($the_path)) {
            require_once($the_path);
        } else {
            die("<div class='bg-warning mt-2'><p class='text-danger'>This file name ${class}.php was not found...</p></div>");

        }
    }

    spl_autoload_register('classAutoLoader');

    function redirect($location) {
       header("Location: {$location}");
    }

    function base() {
        echo str_replace('index.php', '', $_SERVER['PHP_SELF']);
    }

    function makeUrl() {

    }



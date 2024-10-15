<?php
// start Session
session_start();

// Connected DB
require_once "config.php";

// Include Helpers
require_once "helpers/system_helper.php";

// To Get All data At Once (AutoLoader);
spl_autoload_register(function ($class_name) {

    require_once "./lib/$class_name.php";

});

/*
deprecated __autoload

function __autoload($class_name) {

require_once "./lib/$class_name.php";

}

 */

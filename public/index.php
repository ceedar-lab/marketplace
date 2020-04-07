<?php

use Core\Dispatcher;

define('PUBLIQ', dirname(__FILE__));
define('ROOT', dirname(__FILE__, 2));
define('DS', DIRECTORY_SEPARATOR);
define('MODEL', ROOT.DS.'app'.DS.'Model');
define('VIEW', ROOT.DS.'app'.DS.'View');
define('CONTROLLER', ROOT.DS.'app'.DS.'Controller');
define('CORE', ROOT.DS.'core');
define('CSS', DS.'css');
define('IMAGES', DS.'images');
define('JS', DS.'js');
define('AUTOLOAD', ROOT.DS.'vendor'.DS.'autoload.php');

require AUTOLOAD;

new Dispatcher();
<?php


error_reporting(E_ALL);




define('ROOT',dirname(__FILE__));


include_once ROOT.'/components/Router.php';
include_once ROOT.'/components/Db.php';


$run = new Router();
$run->run();
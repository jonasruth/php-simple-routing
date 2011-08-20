<?php
require 'lib/Route.class.php';

$rulelist = array(
    'rule_homepage'=>array(
        'rule'=>'/',
        'action'=>'homepage.php',
    ),
    'rule_produto'=>array(
        'rule'=>'/produto/{titulo_slug}_{id}.{_format}',
        'action'=>'produto.php',
        'params'=>array(            
            'id'=>array('pattern'=>'\d+',),
            //'titulo_slug'=>array('pattern'=>'[\w-]+',),            
            '_format'=>array('pattern'=>'html|pdf|txt',),
        ),
    ),
);

$myRoute = Route::getInstance();
$myRoute->init($_SERVER['REQUEST_URI'],$rulelist)->routePatternMake()->check();
$_route = $myRoute->getMatchedRoute();
$_params = $myRoute->getParams();

include $_route['action'];
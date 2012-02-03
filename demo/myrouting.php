<?php

require '../lib/Route.class.php';

$rulelist = array(
    'rule_homepage' => array(
        'rule'=>'/',
        'action'=>'homepage.php',
    ),
    'rule_produto' => array(
        'rule'=>'/produto/editar_{id}.{_format}',
        'action' => 'produto.php',
        'params' => array(            
            'id' => array('pattern'=>'\d+',),
            'titulo_slug' => array('pattern'=>'[a-z-_]+'),
            '_format' => array('pattern'=>'html|pdf|txt',),
        ),
    ),
    'rule_produto2' => array(
        'rule'=>'/produto/{titulo_slug}_{id}.{_format}',
        'action' => 'produto_especial.php',
        'params' => array(
            'id' => array('pattern'=>'\d+',),
            'titulo_slug' => array('pattern'=>'[a-z-_]+'),
            '_format' => array('pattern'=>'html|pdf|txt',),
        ),
    ),
);

$myRoute = Route::getInstance();
$myRoute
    ->setConfig($rulelist,'localhost','/jonas-php-library/demo/','http')
    ->init($_SERVER['REQUEST_URI'])
    ->check();

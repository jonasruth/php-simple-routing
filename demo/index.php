<?php
 
header('Content-type:text/html; charset=UTF-8');

require '../lib/Route.class.php';

$rulelist = array(
    'rule_startpage' => array(
        'rule'=>'/', // combinará com "http://localhost/jonas-php-library/demo/"
        'action'=>'homepage.php', // a ação a ser tomada
    ),
    'rule_homepage' => array(
        'rule'=>'/home', // combinará com "http://localhost/jonas-php-library/demo/home"
        'action'=>'homepage.php', // a ação a ser tomada
    ),
    'rule_produto' => array(
        'rule'=>'/produto/{titulo_slug}_{id}.{_format}', // ex. "http://localhost/jonas-php-library/demo/produto/nome-do-meu-produto_123456.html"
        'action' => 'produto.php', // a ação a ser tomada
        'params' => array(
            'id' => array('pattern'=>'\d+',), // exige que o placeholder "id" seja uma sequência de dígitos
            'titulo_slug' => array('pattern'=>'[a-z0-9-_]+'), // exige que o placeholder "titulo_slug" combine com alfanuméricos separados por hífen ou sublinhado
            '_format' => array('pattern'=>'html|pdf|txt',), // exige que o placeholder "_format" seja html, pdf ou txt
        ),
    ),
);

$my_protocol = 'http';
$my_domain   = 'localhost';
$my_basedir  = '/jonas-php-library/demo/';

$my_url_prefix = $my_protocol.'://'. $my_domain. $my_basedir;

try {

    $myRoute = Route::getInstance();
    $myRoute
        ->setConfig($rulelist,$my_domain,$my_basedir,$my_protocol)
        ->init($_SERVER['REQUEST_URI'])
        ->check();
    
    include $myRoute->getMatchedRouteAction();
    
}catch (RouteNotFoundException $e){
    
    include 'route-not-found.php';
    
}


?>

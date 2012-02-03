<?php
 
header('Content-type:text/html; charset=UTF-8');
include 'myrouting.php';

include $myRoute->getMatchedRouteAction();

?>

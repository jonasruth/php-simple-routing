<h1>PRODUTO ESPECIAL</h1>

<hr>
<?php 

    echo $myRoute->getMatchedRouteName() .' - '. $myRoute->getMatchedRouteAction();

?>
<hr>
<?php 

    print_r($myRoute->getParams());

?>
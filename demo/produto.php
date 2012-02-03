<h1>PRODUTO</h1>

<?php 

    include 'menu.php';

?>

<hr>
Route&nbsp;&nbsp;= <?php echo $myRoute->getMatchedRouteName(); ?><br/>
Action&nbsp;= <?php echo $myRoute->getMatchedRouteAction(); ?><br/>
<hr>
<?php 

    print_r($myRoute->getParams());

?>
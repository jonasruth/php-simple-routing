<html>

<head>
<title>My homepage</title>
<script type="text/javascript" src="<?php echo $my_url_prefix ?>js/main.js"></script>
<link href="<?php echo $my_url_prefix ?>css/main.css" media="all" rel="stylesheet" type="text/css"/>
</head>

<body>

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

</body>


</html>
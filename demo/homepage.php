<html>

<head>
<title>My homepage</title>
<script type="text/javascript" src="<?php echo $my_url_prefix ?>js/main.js"></script>
<link href="<?php echo $my_url_prefix ?>css/main.css" media="all" rel="stylesheet" type="text/css"/>
</head>

<body>

<h1>HOMEPAGE</h1>

<?php 

    include 'menu.php';

?>

<p>This is my homepage</p>

<button onclick="foo()">Call Foo</button>

<button onclick="bar()">Call Bar</button>

</body>


</html>
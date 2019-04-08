<?php
	$pages=htmlentities($_GET['page']);

	$page=scandir('pages');

	if(!empty($pages) && in_array($_GET['page'].".php",$page))
	{
        $content='pages/'.$_GET['page'].".php";
    }else
    {
       header('Location:index.php?page=home');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>NL Technologie</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link href="assets/css/agency.min.css" rel="stylesheet">
</head>
<body>
<div class="menu">
    <?php
        include('menu/menu.php');
    ?>
</div>
    <div class="contenu">
        <?php
            include($content);
        ?>
    </div>
<div>
    <?php
        include('footer/footer.php');
    ?>
</div>
    <script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="assets/js/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->

    <!-- Custom scripts for this template -->
    <script src="assets/js/agency.min.js"></script>
</body>
</html>
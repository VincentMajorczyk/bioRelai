<?php 
require 'lib/AutoLoader.php';
session_start()?>
<!DOCTYPE html>
<html lang="fr">
	<head>

		<meta charset="utf-8" />
		<title>bioRelai</title>
		<style type="text/css">
			@import url(styles/bioRelai.css);
		</style>
	</head>
	<body>
		<header><img src='images/bioRelai.png'></header>
		<?php
			include_once 'controleurs/controleurPrincipal.php';
		?>
	</body>
</html>
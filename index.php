<!DOCTYPE html> 
<html dir="ltr" lang="pt-PT">
<head>
	<title>HTML5 Video PLayer</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
	<!-- CSS -->
	<link rel="stylesheet" href="./css/reset.css" type="text/css" />              
	<link rel="stylesheet" href="./css/style.css" type="text/css" />              
	 
	<!-- JAVASCRIPT -->
	<script src="./js/jquery-1.6.4.min.js"></script>
	<script src="./js/swfobject.js"></script>
 	<script src="./js/legendas.js"></script>
 	<script src="./js/controller.js"></script>

</script>

 	<!-- SWFOBJECT -->
 	<?php
 	// Caminho absoluto para a pasta dos videos
	$videosFolder = "http://localhost:8888/html5player/videos/";
			
	// Nome do video sem extensão
	$videoName = "o-poder-do-acesso-aberto";
		
	// Tipo de player
	$player = $_GET["player"];
	if(empty($player)) $player = "html";

	// Mecanismo
	include_once("./php/player.php");
	?>
	
 	
</head>
<body>
 	<div id="video_container">
 		
 		<!-- PLAYER -->
 		<div id="video_player">
			<?php setPlayer($player, $htmlVideo, $htmlVideoClose, $flashVideo, $flashVideoClose, $imagesVideo); ?>	
		</div>
        
        <!-- TOOLS -->
        <div id="video_tools">
        	<?php setVideoTools($player, $videosFolder, $videoName) ?>
        </div>
        
        <div id="video_shadow" class="clear"><img src="./images/player-shadow.png" alt="" width="600" height="30"/></div>
        
        <!-- Legendas -->
        <div id="legendas_holder"></div>
       	<div id="legendas">
            <?php include_once("./php/legendas.php"); ?>
        </div>
    </div>
</body>
</html>
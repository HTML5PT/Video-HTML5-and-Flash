<?php
/* ------------------------------------------------------------------------------------------------------------------------------------------------ 
VIDEO TAGS
*/

// HTML VIDEO 
$htmlVideo = "<video id='".$videoName."' width='590' height='332' poster='".$videosFolder."poster-".$videoName.".jpg' controls='controls' preload='none'>\n";
			$htmlVideo .= "\t<source src='".$videosFolder.$videoName.".webm' type='video/webm' />\n";
			$htmlVideo .= "\t<source src='".$videosFolder.$videoName.".mp4' type='video/mp4' />\n";
			$htmlVideo .= "\t<source src='".$videosFolder.$videoName.".ogg' type='video/ogg' />\n";
$htmlVideoClose = "</video>\n";	


// FLASH VIDEO
$flashVideo = "<div id='flash_video'>";
$flashVideoClose = "</div>";

$flashObject = ""; ?>
<script>
var parameters =
{	
	id: "flashvideo",
	src: "<?php echo $videosFolder.$videoName; ?>.flv",
	src_title: "Acesso Aberto",
	autoPlay: "false",
	width: "590",
	height: "367",
	controlBarAutoHide: "false",
	controlBarPosition: "bottom",
	poster: "<?php echo $videosFolder."poster-".$videoName.".jpg"; ?>",
	playButtonOverlay: "true",
	javascriptCallbackFunction: "onJavaScriptBridgeCreated"
	};

swfobject.embedSWF(
	"./flash-player/StrobeMediaPlayback.swf",
	"flash_video",
	590,
	367,
	"10.0.0",
	{},
	parameters,
	{ allowFullScreen: "true"},
	{ name: "flash_video" }
);
</script>
<?php
$flashObject .= "";		
	

// IMAGE 	
$imagesVideo = "<img src='".$videosFolder.$videoName.".jpg' alt='Vídeo' title='Não tem capacidades para ver o vídeo no browser. Faça o download nos links abaixo.' />\n";




/* ------------------------------------------------------------------------------------------------------------------------------------------------
SET PLAYER
*/

function setPlayer($player, $htmlVideo, $htmlVideoClose, $flashVideo, $flashVideoClose, $imagesVideo)
{
	switch ($player)
	{
	    // HTML PLAYER
	    case "html":
	        echo "<h1>HTML5 Video Player</h1>";
	        echo $htmlVideo;
	        echo "\t".$flashVideo;
	        echo "\t\t".$imagesVideo;
	        echo "\t".$flashVideoClose;
	        echo $htmlVideoClose;
	        break;
	    
	    // FLASH PLAYER
	    case "flash":
	    	echo "<h1>Flash Video Player</h1>";
	        echo $flashVideo;
	        echo "\t".$htmlVideo;
	        echo "\t\t".$imagesVideo;
	        echo "\t".$htmlVideoClose;
	        echo $flashVideoClose;
	        break;
	}
}



/* ------------------------------------------------------------------------------------------------------------------------------------------------
SET TOOLS
*/

function setVideoTools($player, $videosFolder, $videoName)
{ ?>
	<!-- Player Switcher -->
	<?php
	$currURL = curPageURL(); 
	$player == "flash" ? $currURL .= "?player=html" : $currURL .= "?player=flash";
	?>
    
    <div id="player_switcher">
    	<span class='switcher_titulo'>player:</span>
        
        <?php if($player == "flash"){ ?>
        	<span class='switcher_activo'>FLASH</span>
        	<img class='switcher_left' src="./images/switcher-left.jpg" width="42" height="17" alt="Player switcher"/>
        	<a href="<?php echo $currURL; ?>" title="Ver video com o Html Player" >HTML</a>
        <?php }else{ ?>
        	<a href="<?php echo $currURL; ?>" title="Ver video com o Flash Player">FLASH</a>
        	<img class='switcher_right' src="./images/switcher-right.jpg" width="42" height="17" alt="Player switcher"/>
        	<span class='switcher_activo'>HTML</span>
        <?php } ?>
		</div>

	<!-- Download Video -->
	<div id="video_download">
    	<span class='switcher_titulo'>download:</span>
        <a href="<?php echo $videosFolder.$videoName.'.mp4' ?>" title="Download do vídeo em mp4" >MP4</a> |
        <a href="<?php echo $videosFolder.$videoName.'.flv' ?>" title="Download do vídeo em flv" >FLV</a>
    </div>

    <!-- Legendas Switcher -->
	<div id="legendas_switcher">
    	<span class='switcher_titulo'>legendas:</span>
        <a title="Mostrar Legendas" class="legendas_on_btn switcher_activo">ON</a>
       	<img class='switcher_left' src="./images/switcher-left.jpg" width="42" height="17" alt="Player switcher"/>
        <img class='switcher_right' src="./images/switcher-right.jpg" width="42" height="17" alt="Player switcher"/>
		<a title="Esconder Legendas" class="legendas_off_btn switcher_inactivo">OFF</a>
    </div>
<?php } ?>
<?php


/* ------------------------------------------------------------------------------------------------------------------------------------------------ 
UTILS
*/

// LER O URL

function curPageURL()
{
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	
	$pageURL = str_replace("?player=flash", "", $currURL);
	$pageURL = str_replace("?player=html", "", $currURL);
				
	return $pageURL;
}
?>
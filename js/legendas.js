var captions = [];
var video;
var legendasHolder;
var output;
var caplen;
var cap;
var text;
var now;
var node = "";
var caption = "";
	
var iExplorer = false;
if(navigator.appName == "Microsoft Internet Explorer"){
	iExplorer = true;
}

// Setu up legendas
function getCaptions(){	
	captions = [];
	
	$j("#legendas p").each(function(i)
	{
		node = $j(this);
		caption = {'start': parseFloat(node.attr('data-begin')),
			'end': parseFloat(node.attr('data-end')),
			'text': node.html()};
		captions.push(caption);
	});
	
	caplen = captions.length;
}

// Mostra legendas 
function timeupdate(videoTime){
	if(typeof videoTime == 'number'){
		now = videoTime; // flash
	}else{
		now = video.currentTime; // html5
	}
	
	text = "";
	cap = "";
	for (var i = 0; i < caplen; i++) {
		cap = captions[i];
		if (now >= cap.start && now <= cap.end) {
			text = cap.text;
			break;
		}
	}
	output.innerHTML = text;
}	

function loadLegendasSys()
{
	// Holder para mecanismo de legendas
	if(iExplorer){
		legendasHolder = document.getElementById('#legendas_holder');
	}else{
		legendasHolder = document.querySelector('#legendas_holder');
	}
	output = document.createElement('div');
	output.id = 'captions';
	
	if(iExplorer){
		video = document.getElementsByTagName('video');
	}else{
		video = document.querySelector('video');
	}
	
	if(video===null){
		if(iExplorer){
			video = document.getElementById('#flash_video');
		}else{
			video = document.querySelector('#flash_video');
		}
	}
	
	if(iExplorer){
		document.all.legendas_holder.appendChild(output);
	}else{
		legendasHolder.appendChild(output, video.nextSibling);
	}
	
	// Recolhe legendas por linha
	getCaptions();
	
	// Inicia Listener para mecanismo de legendas
	if(iExplorer){
		attachEvent('timeupdate', timeupdate);
	}else{
		video.addEventListener('timeupdate', timeupdate, false);
	}
	
	// Esconde #legendas
	$j('#legendas').hide();
	$j('#legendas_holder').show();
}



/* ----------------------------------------------------------------
Comunicacao Flash/Javascipt */

function onCurrentTimeChange(time, playerId)
{
	timeupdate(time);		
}

var player = null;
function onJavaScriptBridgeCreated(playerId)
{
	if (player === null){
		if( typeof(playerId) == "string" && playerId.length > 0 ){
			player =  document.getElementById(playerId);
			if(player){
				player.addEventListener("currentTimeChange", "onCurrentTimeChange");
			}
		}
	}
}
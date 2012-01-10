var $j = jQuery.noConflict();
$j("document").ready(function()
{
	$j('#player_switcher').show();
	$j('#legendas_switcher').show();
	$j("#legendas_switcher .switcher_right").hide();
	
	/* ----------------------------------------------------------------
	Click no video para iniciar (mobile devices optimizacao) */

	$j("video").click(function(){
		this.play();
	});
			
	/* ----------------------------------------------------------------
	Inicia sistema em legendas.js */
	loadLegendasSys();	
	
	/* ----------------------------------------------------------------
	VIDEO TOOLS */
	
	// Mostrar Legendas
	$j('.legendas_on_btn').click(function()
	{
		$j(this).removeClass("switcher_inactivo").addClass("switcher_activo");
		$j("#legendas_switcher .switcher_left").show();
		$j("#legendas_switcher .switcher_right").hide();
		$j(".legendas_off_btn").removeClass("switcher_activo").addClass("switcher_inactivo");
		$j('#legendas_holder').fadeIn();
		return false;
	});
	
	$j('.legendas_off_btn').click(function()
	{
		$j(this).removeClass("switcher_inactivo").addClass("switcher_activo");
		$j("#legendas_switcher .switcher_left").hide();
		$j("#legendas_switcher .switcher_right").show();
		$j(".legendas_on_btn").removeClass("switcher_activo").addClass("switcher_inactivo");
		$j('#legendas_holder').fadeOut();
		return false;
	});
	
	
});



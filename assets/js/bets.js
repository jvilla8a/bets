function overlay() {
	el = document.getElementById("overlay-modal");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}

function overlayClose(){
	document.getElementById("#page-wrapper");

}

/*---------->GAMES<------------*/
  		/* EFFECTO SOMBRA */


function teamSelect(){
	$("#team1").click(function(){
		$("#team1").fadeTo("slow", 1);
		$("#team2").fadeTo("slow", 0.50);
		$("#vote").fadeIn("slow");
	});
	$("#team2").click(function(){
		$("#team2").fadeTo("slow", 1);
		$("#team1").fadeTo("slow", 0.50);
		$("#vote").fadeIn("slow");
	});
}

function lcs(){
 		$(".lcs-home").toggle("slow");
	}


$( document ).ready(function() {

	/*======== Initial =======*/
	$("#form-new-team").hide();
	$("#form-new-player").hide();
	$("#form-new-match").hide();
	$("#form-new-league").hide();
	$("#form-new-region").hide();

	$("#btnListTeams").hide();
	$("#btnListPlayers").hide();
	$("#btnListMatchs").hide();
	$("#btnListLeagues").hide();
	$("#btnListRegions").hide();
	/*======== Initial =======*/


	$("#btnAddTeams").click(function(event){
		$("#form-new-team").show();
		$("#btnListTeams").show();
		$("#list-teams").hide();
		$(this).hide();
	});
	$("#btnAddPlayers").click(function(event){
		$(this).hide();
		$("#form-new-player").show();
		$("#btnListPlayers").show();
		$("#list-players").hide();
	});
	$("#btnAddMatchs").click(function(event){
		$(this).hide();
		$("#form-new-match").show();
		$("#btnListMatchs").show();
		$("#list-matchs").hide();
	});
	$("#btnAddLeagues").click(function(event){
		$(this).hide();
		$("#form-new-league").show();
		$("#btnListLeagues").show();
		$("#list-leagues").hide();
	});
	$("#btnAddRegions").click(function(event){
		$(this).hide();
		$("#form-new-region").show();
		$("#btnListRegions").show();
		$("#list-regions").hide();
	});



	$("#btnListTeams").click(function(event){
		$(this).hide();
		$("#form-new-team").hide();
		$("#btnAddTeams").show();
		$("#list-teams").show();
	});
	$("#btnListPlayers").click(function(event){
		$(this).hide();
		$("#form-new-player").hide();
		$("#btnAddPlayers").show();
		$("#list-players").show();
	});
	$("#btnListMatchs").click(function(event){
		$(this).hide();
		$("#form-new-match").hide();
		$("#btnAddMatchs").show();
		$("#list-matchs").show();
	});
	$("#btnListLeagues").click(function(event){
		$(this).hide();
		$("#form-new-league").hide();
		$("#btnAddLeagues").show();
		$("#list-leagues").show();
	});
	$("#btnListRegions").click(function(event){
		$(this).hide();
		$("#form-new-region").hide();
		$("#btnAddRegions").show();
		$("#list-regions").show();
	});
});

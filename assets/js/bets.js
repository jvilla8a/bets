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
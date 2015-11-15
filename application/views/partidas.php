<!DOCTYPE HTML>
<html>
	<head>
		<title>Halcyonic by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/stylesheets/main.css" />
		<link rel="stylesheet" href="assets/stylesheets/bets.css" />
		<link rel="stylesheet" href="assets/stylesheets/bootstrap.min.css" />
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">
						<div class="row">
							<div class="12u">

								<!-- Logo -->
									<h1><a href="#" id="logo">Halcyonic</a></h1>

								<!-- Nav -->
									<nav id="nav">
										<a href="index.php">Inicio</a>
										<a href="vPartidas.php">Partidas</a>
										<a href="equipos.php">Equipos</a>
										<a href="entrevistas.php">Entrevistas</a>
										<a href="registro.php">Registro</a>
									</nav>

							</div>
						</div>
					</header>
				</div>
			<div class="container">
				<div id="features-wrapper">
					<div id="features">
						<div class="container">
							<div id="games">
								<div id="juego-dia" class="text-center">
									<h1> Juego del Día</h1>
									<div id="team1"><a href="#" onclick="teamSelect()"><img src="assets/images/fnatic.png" alt="Fnatic"></a></div>
									<div id="vote"><a href="#" data-toggle="modal" data-target="#myModal"><img src="assets/images/btn-vote.png" width="50" height="50" alt=""></a></div>
									<div id="team2"><a href="#" onclick="teamSelect()"><img src="assets/images/origen.png" alt="Origen"></a></div>
									<div id="myModal" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									  	<div class="modal-content">
									    	<div class="modal-header">
									        	<button type="button" class="close" data-dismiss="modal">&times;</button>
									        	<h4 class="modal-title">Debes iniciar sesión primero</h4>
									      	</div>
									    	<div class="modal-body">
									            <form class="form-horizontal" "text-center">
										          	<br />
														<div class="form-group">
													    	<label class="modal-login" for="Email">Email address</label>
													    	<input type="email" class="form-control" id="email" placeholder="Email">
													  	</div>
													  	<div class="form-group">
													    	<label class="modal-login" for="Password">Password</label>
													    	<input type="password" class="form-control" id="pass" placeholder="Password">
													    	<br />
													    	<button type="button" class="btn btn-success">Login</button>
													    	<br />
													    	<br />
													    	<br />
													  	</div>
												</form>
									     	 </div>
									      	<div class="modal-footer">
									       	    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									      	</div>
									    </div>
									  </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="assets/js/bets.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/skel-viewport.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>
	</body>
</html>
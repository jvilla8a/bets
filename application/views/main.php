<a href='<?" . base_url() . "?>index.php/cAdmin/index'>Admin Home</a>
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
					<div id="banner">
						<div class="container">
							<div class="row">
								<div class="6u 12u(mobile)">

									<!-- Banner Copy -->
										<p>Apuesta por tus equipos favoritos y gana ? mira la informacion sobre tus equipos favoritos...</p>
										<a href="#" data-toggle="modal" data-target="#myModal" id="btn-inicio" class="button-big">Inicia sesión empezar!</a>
										<div id="myModal" class="modal fade" role="dialog">
										  <div class="modal-dialog">
										  	<div class="modal-content">
										    	<div class="modal-body">
										            <form action="" class="form-horizontal" "text-center" method="post">
											          	<br />
															<div class="form-group">
														    	<label class="modal-login" id="home-modal-mail" for="Email">Email</label>
														    	<input type="email" class="form-control" id="email" placeholder="Email" required>
														  	</div>
														  	<div class="form-group">
														    	<label class="modal-login" id="home-modal-pass" for="Password">Password</label>
														    	<input type="password" class="form-control" id="pass" placeholder="Password" required>
														    	<br />
														    	<button type="button" id="home-modal-login" class="btn btn-success">Login</button>
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
								<div class="6u 12u(mobile)">

									<!-- Banner Image -->
										<a href="#" class="bordered-feature-image"><img src="assets/thumbs/banner-lol.jpg" height="220" alt="" /></a>

								</div>
							</div>
						</div>
					</div>
				</div>

			<!-- Features -->
				<div id="features-wrapper">
					<div id="features">
						<div class="container">
							<div id="last-match">
								<div id="europe">
									<img src="assets/images/fnatic.png" alt="Fnatic">
									<img src="assets/images/origen.png" alt="Origen">
									<img src="assets/images/h2k.png" alt="H2K">
								</div>
								<div id="NorthAmerica">
									<img src="assets/images/tsm.png" alt="Team Solo Mid">
									<img src="assets/images/clg.png" alt="Counter Logic Gaming">
									<img src="assets/images/cloud9.png" alt="Cloud 9">
								</div>
								<div id="korea">
									<img src="assets/images/koo.png" alt="Koo Tigers">
									<img src="assets/images/kt.png" alt="KT Rolster">
									<img src="assets/images/skt.png" alt="SKTelecom">
								</div>
							</div>
							<div class="row">
								<div class="3u 12u(mobile)">

									<!-- Feature #2 -->
										<section>
											<button onclick="lcs()" id="eu-lcs" class="bordered-feature-image"><img src="assets/images/eulcs.jpg" height="110" alt="Eu" /></button>
											<h2>LCS Europa</h2>
											<div class="lcs-home">
												<p>
													Yes! Halcyonic is built on the
													framework, so it has full responsive support for desktop, tablet,
													and mobile device displays.
												</p>
											</div>
										</section>

								</div>
								<div class="3u 12u(mobile)" style="margin-left:120px;">

									<!-- Feature #3 -->
										<section>
											<button onclick="lcs()" class="bordered-feature-image"><img src="assets/images/nalcs.jpg" height="110" alt="Na" /></button>
											<h2>LCS Norte America</h2>
											<div class="lcs-home">
												<p>
													Halcyonic is licensed under the <a href="http://html5up.net/license">CCA 3.0</a> license,
													so use it for personal or commercial use as much as you like (just keep
													the footer credit intact).
												</p>
											</div>
										</section>

								</div>
								<div class="3u 12u(mobile)" style="margin-left:100px;">

									<!-- Feature #4 -->
										<section>
											<button onclick="lcs()" class="bordered-feature-image"><img src="assets/images/lck.jpg" height="110" alt="Korea" /></button>
											<h2>Korea</h2>
											<div class="lcs-home">
												<p>
													Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. Suspendisse
													eu varius nibh. Suspendisse vitae magna eget odio amet mollis.
												</p>
											</div>
										</section>

								</div>
							</div>
						</div>
					</div>
				</div>

			<!-- Content -->
				<div id="content-wrapper">
					<div id="content">
						<div class="container">
							<div class="row">
								<div class="4u 12u(mobile)">

									<!-- Box #1 -->
										<section>
											<header>
												<h2>Who We Are</h2>
												<h3>A subheading about who we are</h3>
											</header>
											<a href="#" class="feature-image"><img src="images/pic05.jpg" alt="" /></a>
											<p>
												Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed.
												Suspendisse eu varius nibh. Suspendisse vitae magna eget odio amet mollis
												justo facilisis quis. Sed sagittis mauris amet tellus gravida lorem ipsum.
											</p>
										</section>

								</div>
								<div class="4u 12u(mobile)">

									<!-- Box #2 -->
										<section>
											<header>
												<h2>What We Do</h2>
												<h3>A subheading about what we do</h3>
											</header>
											<ul class="check-list">
												<li>Sed mattis quis rutrum accum</li>
												<li>Eu varius nibh suspendisse lorem</li>
												<li>Magna eget odio amet mollis justo</li>
												<li>Facilisis quis sagittis mauris</li>
												<li>Amet tellus gravida lorem ipsum</li>
											</ul>
										</section>

								</div>
								<div class="4u 12u(mobile)">

									<!-- Box #3 -->
										<section>
											<div id="twitter">
												<a class="twitter-timeline" href="https://twitter.com/lolesports" data-widget-id="665914875143716865">Tweets por el @lolesports.</a>
												<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
											</div>
										</section>

								</div>
							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<div class="8u 12u(mobile)">

								<!-- Links -->
									<section>
										<h2>Links to Important Stuff</h2>
										<div>
											<div class="row">
												<div class="3u 12u(mobile)">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
												<div class="3u 12u(mobile)">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
												<div class="3u 12u(mobile)">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
												<div class="3u 12u(mobile)">
													<ul class="link-list last-child">
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
													</ul>
												</div>
											</div>
										</div>
									</section>

							</div>
							<div class="4u 12u(mobile)">

								<!-- Blurb -->
									<section>
										<h2>An Informative Text Blurb</h2>
										<p>
											Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. Suspendisse eu
											varius nibh. Suspendisse vitae magna eget odio amet mollis. Duis neque nisi,
											dapibus sed mattis quis, sed rutrum accumsan sed. Suspendisse eu varius nibh
											lorem ipsum amet dolor sit amet lorem ipsum consequat gravida justo mollis.
										</p>
									</section>

							</div>
						</div>
					</footer>
				</div>

			<!-- Copyright -->
				<div id="copyright">
					&copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a>
				</div>

		</div>

	<!-- Scripts -->
		<script>
			 // $(document).ready(function(){
				//  	// $("#btn-inicio").click(function(){
				//  	// 	$("#page-wrapper").css("opacity", "0.30");
				//  	// });
				//  	// $("#btn-inicio").click(function(){
				//  	// 	$("#inside-modal").fadeIn("slow");
				//  	// });
			 // }); 
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/bets.js"></script>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/skel-viewport.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>
	</body>
</html>

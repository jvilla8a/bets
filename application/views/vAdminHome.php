<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
	<? echo '<link rel="stylesheet" type="text/css" href="' . base_url() . '/assets/stylesheets/admin.css">' ?>

	<? echo '<script type="text/javascript" src="' . base_url() . '/assets/js/jquery-2.1.4.min.js"></script>' ?>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container-fluid" id="admin">
		<div class="col-xs-2 menu-left">
			<ul>
				<li><a href="#">Link <span class="sr-only">(current)</span></a></li>
				<li><a href="#">Link</a></li>
			</ul>
		</div>
		<div class="row">
			<div class="col-xs-10 col-xs-offset-2">
				<div class="container">
					<div id="teams">
						<h2 class="text-center">TEAMS</h2>

						<a href="#" class="btn btn-primary">Listar</a>
						<a href="#" class="btn btn-primary">Agregar</a>

						<div id="list-teams">
							<table class="table table-striped">
								<thead>
									<tr>
										<td>Short Name</td>
										<td>Name</td>
										<td colspan="3"></td>
									</tr>
								</thead>

								<tbody>
									<tr>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>

						<div id="form-new-team">
							<?= form_open(base_url()."index.php/cAdmin/") ?>
								<div class="form-group col-sm-12">
									<label for="txtTeamName">Team Name</label>
			                    	<input id="txtTeamName" name="txtTeamName" class="form-control" maxlenght="50" placeholder="Team Name" type="text" required />
			                   	</div>

			                   	<div class="form-group col-sm-6">
									<label for="txtTeamShortName">Team Short Name</label>
			                    	<input id="txtTeamShortName" name="txtTeamShortName" class="form-control" maxlenght="3" placeholder="Team Short Name" type="text" required />
			                   	</div>

			                   	<div class="form-group col-sm-6">
									<label for="txtTeamLeague">League</label>
			                    	<select id="txtTeamLeague" name="txtTeamLeague" class="form-control" placeholder="League" required><?
										foreach ($leagues->result() as $league)
										{
											echo "<option value='$league->usuario'>". ucwords($league->usuario) ."</option>";
										}
									?></select>
			                   	</div>

			                   	<input type="submit" class="btn btn-success" value="Save"  />
			                   	<input type="reset" class="btn btn-success" value="Restablecer"/>
		                   	<?= form_close() ?>
			            </div>
					</div>

					<div id="players">
						<h2 class="text-center">PLAYERS</h2>
						
					</div>

					<div id="matchs">
						<h2 class="text-center">MATCHS</h2>
						
					</div>

					<div id="leagues">
						<h2 class="text-center">LEAGUES</h2>
						
					</div>

					<div id="regions">
						<h2 class="text-center">REGIONS</h2>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
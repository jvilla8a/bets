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

						<a href="#" class="btn btn-primary">List</a>
						<a href="#" class="btn btn-primary">Add</a>

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
											echo "<option value='$league->id'>". ucwords($league->name) ."</option>";
										}
									?></select>
			                   	</div>

			                   	<div class="clearfix"></div>

			                   	<input type="submit" class="btn btn-success" value="Save"  />
			                   	<input type="reset" class="btn btn-warning" value="Clear"/>
		                   	<?= form_close() ?>

		                   	<div id="error">
								<? echo validation_errors(); ?>
							</div>
			            </div>
					</div>

					<div id="players">
						<h2 class="text-center">PLAYERS</h2>
						
						<a href="#" class="btn btn-primary">List</a>
						<a href="#" class="btn btn-primary">Add</a>

						<div id="list-teams">
							<table class="table table-striped">
								<thead>
									<tr>
										<td>Summoner Name</td>
										<td>Team</td>
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

						<div id="form-new-player">
							<?= form_open(base_url()."index.php/cAdmin/") ?>
								<div class="form-group col-sm-6">
									<label for="txtSummonerName">Summoner Name</label>
			                    	<input id="txtSummonerName" name="txtSummonerName" class="form-control" maxlenght="50" placeholder="Summoner Name" type="text" required />
			                   	</div>

			                   	<div class="form-group col-sm-6">
									<label for="txtPlayerTeam">Player Team</label>
			                    	<select id="txtPlayerTeam" name="txtPlayerTeam" class="form-control" required><?
										foreach ($teams->result() as $team)
										{
											echo "<option value='$team->id'>". ucwords($team->shortname) ."</option>";
										}
									?></select>
			                   	</div>

			                   	<div class="clearfix"></div>

			                   	<input type="submit" class="btn btn-success" value="Save"  />
			                   	<input type="reset" class="btn btn-warning" value="Clear"/>
		                   	<?= form_close() ?>

		                   	<div id="error">
								<? echo validation_errors(); ?>
							</div>
			            </div>
					</div>

					<div id="matchs">
						<h2 class="text-center">MATCHS</h2>

						<a href="#" class="btn btn-primary">List</a>
						<a href="#" class="btn btn-primary">Add</a>

						<div id="list-teams">
							<table class="table table-striped">
								<thead>
									<tr>
										<td>Team Blue</td>
										<td>Team Red</td>
										<td>Date</td>
										<td>Season</td>
										<td>Split</td>
										<td>State</td>
										<td colspan="3">Opciones</td>
									</tr>
								</thead>

								<tbody>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td>Activar</td>
										<td>Ver</td>
										<td>Modificar</td>
									</tr>
								</tbody>
							</table>
						</div>

						<div id="form-new-match">
							<?= form_open(base_url()."index.php/cAdmin/") ?>
								<div class="form-group col-sm-6">
									<label for="txtMatchTeamBlue">Team Blue</label>
			                    	<select id="txtMatchTeamBlue" name="txtMatchTeamBlue" class="form-control" placeholder="League" required><?
										foreach ($teams->result() as $team)
										{
											echo "<option value='$team->id'>". ucwords($team->shortname) ."</option>";
										}
									?></select>
			                   	</div>

			                   	<div class="form-group col-sm-6">
									<label for="txtMatchTeamRed">Team Red</label>
			                    	<select id="txtMatchTeamRed" name="txtMatchTeamRed" class="form-control" placeholder="League" required><?
										foreach ($teams->result() as $team)
										{
											echo "<option value='$team->id'>". ucwords($team->shortname) ."</option>";
										}
									?></select>
			                   	</div>

								<div class="form-group col-sm-6">
									<label for="txtMatchDate">Date</label>
			                    	<input id="txtMatchDate" name="txtMatchDate" class="form-control" type="date" required />
			                   	</div>

			                   	<div class="form-group col-sm-6">
									<label for="txtMatchSeasson">Seasson</label>
			                    	<select id="txtMatchSeasson" name="txtMatchSeasson" class="form-control" placeholder="League" required>
										<option value='5'>Seasson 5</option>
										<option value='6'>Seasson 6</option>
									</select>
			                   	</div>

			                   	<div class="form-group col-sm-6">
									<label for="txtMatchSplit">split</label>
			                    	<select id="txtMatchSplit" name="txtMatchSplit" class="form-control" placeholder="League" required>
										<option value='spring'>Spring</option>
										<option value='summer'>Summer</option>
									</select>
			                   	</div>

			                   	<div class="clearfix"></div>

			                   	<input type="submit" class="btn btn-success" value="Save"  />
			                   	<input type="reset" class="btn btn-warning" value="Clear"/>
		                   	<?= form_close() ?>

		                   	<div id="error">
								<? echo validation_errors(); ?>
							</div>
			            </div>						
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
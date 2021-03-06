<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<? echo '<link rel="stylesheet" type="text/css" href="' . base_url() . '/assets/stylesheets/admin.css">' ?>

	<? echo '<script type="text/javascript" src="' . base_url() . '/assets/js/jquery-2.1.4.min.js"></script>' ?>
	<? echo '<script type="text/javascript" src="' . base_url() . '/assets/js/bets.js"></script>' ?>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">Admin</a>
			</div>

			<div class="container">
				<ul class="nav navbar-nav">
					<li><? echo "<a href=". base_url() ."index.php/formulario/index/><i class='fa fa-sign-out'></i> Logout</a>" ?></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container" id="admin">
		<div class="row">
			<div class="col-xs-12">
				<div id="teams">
					<h2 class="text-center">TEAMS</h2>

					<a class="btn btn-primary" id="btnListTeams"><i class="fa fa-list"></i>  List</a>
					<a class="btn btn-primary" id="btnAddTeams"><i class="fa fa-plus"></i>  Add</a>

					<div id="list-teams">
						<table class="table table-striped"><h3>Active</h3>
							<thead>
								<tr>
									<td><b>Short Name</b></td>
									<td><b>Name</b></td>
									<td colspan="2"><b>Options</b></td>
								</tr>
							</thead>

							<tbody><?
								foreach ($teams->result() as $team){
									if ($team->active == 1) {
										echo "	<tr>
										<td>". $team->shortname ."</td>
										<td>". $team->name ."</td>
										<td><a href='". base_url() ."index.php/cAdmin/desactivateTeam/". $team->id ."'><i class='fa fa-toggle-on'></i></a></td>
										<td><a href='". base_url() ."index.php/cAdmin/editTeam/". $team->id ."'><i class='fa fa-pencil'></i> Edit</a></td>
									</tr>";
								}
							}?>
						</tbody>
					</table>

					<hr>

					<table class="table table-striped"><h3>Deactive</h3>
						<thead>
							<tr>
								<td><b>Short Name</b></td>
								<td><b>Name</b></td>
								<td colspan="2"><b>Options</b></td>
							</tr>
						</thead>

						<tbody><?
							foreach ($teams->result() as $team){
								if ($team->active == 0) {
									echo "	<tr>
									<td>". $team->shortname ."</td>
									<td>". $team->name ."</td>
									<td><a href='". base_url() ."index.php/cAdmin/activateTeam/". $team->id ."'><i class='fa fa-toggle-off'></i></a></td>
									<td><a href='". base_url() ."index.php/cAdmin/editTeam/". $team->id ."'><i class='fa fa-pencil'></i> Edit</a></td>
								</tr>";
							}
						}?>
					</tbody>
				</table>
			</div>

			<div id="form-new-team">
				<?= form_open(base_url()."index.php/cAdmin/addTeam") ?>
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

					<input type="submit" class="btn btn-success" value="Save"/>
					<input type="reset" class="btn btn-warning" value="Clear"/>
					<?= form_close() ?>

					<div id="error">
						<? echo validation_errors(); ?>
					</div>
				</div>
			</div>

			<hr>

			<div id="players">
				<h2 class="text-center">PLAYERS</h2>

				<a class="btn btn-primary" id="btnListPlayers"><i class="fa fa-list"></i>  List</a>
				<a class="btn btn-primary" id="btnAddPlayers"><i class="fa fa-plus"></i>  Add</a>

				<div id="list-players">
					<table class="table table-striped"><h3>Active</h3>
						<thead>
							<tr>
								<td><b>Summoner Name</b></td>
								<td><b>Team</b></td>
								<td colspan="2"><b>Options</b></td>
							</tr>
						</thead>

						<tbody><?
							foreach ($players->result() as $player){
								foreach ($teams->result() as $team) {
									if ($team->id == $player->idteam) {
										$teamName = $team->shortname;
									}
								}
								if ($player->active == 1) {
									echo "	<tr>
									<td>". $player->summoner ."</td>
									<td>". $teamName ."</td>
									<td><a href='". base_url() ."index.php/cAdmin/desactivatePlayer/". $player->id ."'><i class='fa fa-toggle-on'></i></a></td>
									<td><a href='". base_url() ."index.php/cAdmin/editPlayer/". $player->id ."'><i class='fa fa-pencil'></i> Edit</a></td>
								</tr>";
							}
						}?>
					</tbody>
				</table>

				<hr>

				<table class="table table-striped"><h3>Deactive</h3>
					<thead>
						<tr>
							<td><b>Summoner Name</b></td>
							<td><b>Team</b></td>
							<td colspan="2"><b>Options</b></td>
						</tr>
					</thead>

					<tbody><?
						foreach ($players->result() as $player){
							foreach ($teams->result() as $team) {
								if ($team->id == $player->idteam) {
									$teamName = $team->shortname;
								}
							}
							if ($player->active == 0) {
								echo "	<tr>
								<td>". $player->summoner ."</td>
								<td>". $teamName ."</td>
								<td><a href='". base_url() ."index.php/cAdmin/activatePlayer/". $player->id ."'><i class='fa fa-toggle-off'></i></a></td>
								<td><a href='". base_url() ."index.php/cAdmin/editPlayer/". $player->id ."'><i class='fa fa-pencil'></i> Edit</a></td>
							</tr>";
						}
					}?>
				</tbody>
			</table>
		</div>

		<div id="form-new-player">
			<?= form_open(base_url()."index.php/cAdmin/addPlayer") ?>
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

				<input type="submit" class="btn btn-success" value="Save"/>
				<input type="reset" class="btn btn-warning" value="Clear"/>
				<?= form_close() ?>

				<div id="error">
					<? echo validation_errors(); ?>
				</div>
			</div>
		</div>

		<hr>

		<div id="matchs">
			<h2 class="text-center">MATCHS</h2>

			<a class="btn btn-primary"  id="btnListMatchs"><i class="fa fa-list"></i>  List</a>
			<a class="btn btn-primary" id="btnAddMatchs"><i class="fa fa-plus"></i>  Add</a>

			<div id="list-matchs">
				<table class="table table-striped"><h3>Active</h3>
					<thead>
						<tr>
							<td><b>Team Blue</b></td>
							<td><b>Team Red</b></td>
							<td><b>Date</b></td>
							<td><b>Season</b></td>
							<td><b>Split</b></td>
							<td><b>State</b></td>
							<td colspan="3"><b>Options</b></td>
						</tr>
					</thead>

					<tbody><?
						foreach ($matchs->result() as $match){
							if ($match->active == 1) {
								foreach ($tMHistories->result() as $teamh) {
									if ($teamh->idmatch == $match->id) {
										foreach ($teams->result() as $team) {
											if ($teamh->idteam == $team->id) {
												if ($teamh->side == 1) {
													$teamBlueSide = $team->shortname;
												}

												if ($teamh->side == 0) {
													$teamRedSide = $team->shortname;
												}
											}
										}
									}
								}
								$date = $match->date;
								$date = date("j F");
								echo "	<tr>
								<td>". $teamBlueSide ."</td>
								<td>". $teamRedSide ."</td>
								<td>". $date ."</td>
								<td>". $match->season ."</td>
								<td>". $match->split ."</td>
								<td><a href='". base_url() ."index.php/cAdmin/desactivateMatch/". $match->id ."'><i class='fa fa-toggle-on'></i></a></td>
								<td><a href='". base_url() ."index.php/cAdmin/seeMatch/". $match->id ."'><i class='fa fa-eye'></i></a></td>
								<td><a href='". base_url() ."index.php/cAdmin/editMatch/". $match->id ."'><i class='fa fa-pencil'></i> Edit</a></td>
								<td><a href='". base_url() ."index.php/cAdmin/deleteMatch/". $match->id ."'><i class='fa fa-trash'></i></a></td>
							</tr>";
						}
					}?>
				</tbody>
			</table>

			<hr>

			<table class="table table-striped"><h3>Deactive</h3>
				<thead>
					<tr>
						<td><b>Team Blue</b></td>
						<td><b>Team Red</b></td>
						<td><b>Date</b></td>
						<td><b>Season</b></td>
						<td><b>Split</b></td>
						<td><b>State</b></td>
						<td colspan="3"><b>Options</b></td>
					</tr>
				</thead>

				<tbody><?
					foreach ($matchs->result() as $match){
						if ($match->active == 0) {
							foreach ($tMHistories->result() as $teamh) {
								if ($teamh->idmatch == $match->id) {
									foreach ($teams->result() as $team) {
										if ($teamh->idteam == $team->id) {
											if ($teamh->side == 1) {
												$teamBlueSide = $team->shortname;
											}

											if ($teamh->side == 0) {
												$teamRedSide = $team->shortname;
											}
										}
									}
								}
							}
							$date = $match->date;
							$date = date("j F");
							echo "	<tr>
							<td>". $teamBlueSide ."</td>
							<td>". $teamRedSide ."</td>
							<td>". $date ."</td>
							<td>". $match->season ."</td>
							<td>". $match->split ."</td>
							<td><a href='". base_url() ."index.php/cAdmin/activateMatch/". $match->id ."'><i class='fa fa-toggle-off'></i></a></td>
							<td><a href='". base_url() ."index.php/cAdmin/seeMatch/". $match->id ."'><i class='fa fa-eye'></i></a></td>
							<td><a href='". base_url() ."index.php/cAdmin/editMatch/". $match->id ."'><i class='fa fa-pencil'></i> Edit</a></td>
							<td><a href='". base_url() ."index.php/cAdmin/deleteMatch/". $match->id ."'><i class='fa fa-trash'></i></a></td>
						</tr>";
					}
				}?>
			</tbody>
		</table>
	</div>

	<div id="form-new-match">
		<?= form_open(base_url()."index.php/cAdmin/addMatch") ?>
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

				<input type="submit" class="btn btn-success" value="Save"/>
				<input type="reset" class="btn btn-warning" value="Clear"/>
				<?= form_close() ?>

				<div id="error">
					<? echo validation_errors(); ?>
				</div>
			</div>
		</div>

		<hr>

		<div id="leagues">
			<h2 class="text-center">LEAGUES</h2>

			<a class="btn btn-primary" id="btnListLeagues"><i class="fa fa-list"></i>  List</a>
			<a class="btn btn-primary" id="btnAddLeagues"><i class="fa fa-plus"></i>  Add</a>

			<div id="list-leagues">
				<table class="table table-striped"><h3>Active</h3>
					<thead>
						<tr>
							<td><b>League Name</b></td>
							<td><b>Region</b></td>
							<td colspan="3"><b>Options</b></td>
						</tr>
					</thead>

					<tbody><?
						foreach ($leagues->result() as $league){
							foreach ($regions->result() as $region) {
								if ($league->active == 1 && $league->idregion == $region->id) {
									echo "	<tr>
									<td>". $league->name ."</td>
									<td>". $region->name ."</td>
									<td><a href='". base_url() ."index.php/cAdmin/desactivateLeague/". $league->id ."'><i class='fa fa-toggle-on'></i></a></td>
									<td><a href='". base_url() ."index.php/cAdmin/editLeague/". $league->id ."'><i class='fa fa-pencil'></i> Edit</a></td>
								</tr>";
							}
						}
					}?>
				</tbody>
			</table>

			<hr>

			<table class="table table-striped"><h3>Deactive</h3>
				<thead>
					<tr>
						<td><b>League Name</b></td>
						<td><b>Region</b></td>
						<td colspan="3"><b>Options</b></td>
					</tr>
				</thead>

				<tbody><?
					foreach ($leagues->result() as $league){
						foreach ($regions->result() as $region) {
							if ($league->active == 0 && $league->idregion == $region->id) {
								echo "	<tr>
								<td>". $league->name ."</td>
								<td>". $region->name ."</td>
								<td><a href='". base_url() ."index.php/cAdmin/activateLeague/". $league->id ."'><i class='fa fa-toggle-off'></i></a></td>
								<td><a href='". base_url() ."index.php/cAdmin/editLeague/". $league->id ."'><i class='fa fa-pencil'></i> Edit</a></td>
							</tr>";
						}
					}
				}?>
			</tbody>
		</table>
	</div>

	<div id="form-new-league">
		<?= form_open(base_url()."index.php/cAdmin/addLeague") ?>
		<div class="form-group col-sm-6">
			<label for="txtLeagueName">League Name</label>
			<input id="txtLeagueName" name="txtLeagueName" class="form-control" maxlenght="50" placeholder="League Name" type="text" required />
		</div>

		<div class="form-group col-sm-6">
			<label for="txtRegionLeague">Region</label>
			<select id="txtRegionLeague" name="txtRegionLeague" class="form-control" required><?
				foreach ($regions->result() as $region)
				{
					echo "<option value='$region->id'>". ucwords($region->name) ."</option>";
				}
				?></select>
			</div>

			<div class="clearfix"></div>

			<input type="submit" class="btn btn-success" value="Save"/>
			<input type="reset" class="btn btn-warning" value="Clear"/>
			<?= form_close() ?>

			<div id="error">
				<? echo validation_errors(); ?>
			</div>
		</div>
	</div>

	<hr>

	<div id="regions">
		<h2 class="text-center">REGIONS</h2>

		<a class="btn btn-primary" id="btnListRegions"><i class="fa fa-list"></i>  List</a>
		<a class="btn btn-primary" id="btnAddRegions"><i class="fa fa-plus"></i>  Add</a>

		<div id="list-regions">
			<table class="table table-striped"><h3>Active</h3>
				<thead>
					<tr>
						<td><b>Region Name</b></td>
						<td colspan="3"><b>Options</b></td>
					</tr>
				</thead>

				<tbody><?
					foreach ($regions->result() as $region){
						if ($region->active == 1) {
							echo "	<tr>
							<td>". $region->name ."</td>
							<td><a href='". base_url() ."index.php/cAdmin/desactivateRegion/". $region->id ."'><i class='fa fa-toggle-on'></i></td>
							<td><a href='". base_url() ."index.php/cAdmin/editRegion/". $region->id ."'><i class='fa fa-pencil'></i> Edit</a></td>
						</tr>";
					}
				}?>
			</tbody>
		</table>

		<hr>

		<table class="table table-striped"><h3>Deactive</h3>
			<thead>
				<tr>
					<td><b>Region Name</b></td>
					<td colspan="3"><b>Options</b></td>
				</tr>
			</thead>

			<tbody><?
				foreach ($regions->result() as $region){
					if ($region->active == 0) {
						echo "	<tr>
						<td>". $region->name ."</td>
						<td><a href='". base_url() ."index.php/cAdmin/activateRegion/". $region->id ."'><i class='fa fa-toggle-off'></i></a></td>
						<td><a href='". base_url() ."index.php/cAdmin/editRegion/". $league->id ."'><i class='fa fa-pencil'></i> Edit</a></td>
					</tr>";
				}
			}?>
		</tbody>
	</table>
</div>

<div id="form-new-region">
	<?= form_open(base_url()."index.php/cAdmin/addRegion") ?>
	<div class="form-group col-sm-6">
		<label for="txtRegionName">Region Name</label>
		<input id="txtRegionName" name="txtRegionName" class="form-control" maxlenght="50" placeholder="Region Name" type="text" required />
	</div>

	<div class="clearfix"></div>

	<input type="submit" class="btn btn-success" value="Save"/>
	<input type="reset" class="btn btn-warning" value="Clear"/>
	<?= form_close() ?>

	<div id="error">
		<? echo validation_errors(); ?>
	</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>

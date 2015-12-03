<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<? echo '<link rel="stylesheet" type="text/css" href="' . base_url() . '/assets/stylesheets/admin.css">' ?>

	<? echo '<script type="text/javascript" src="' . base_url() . '/assets/js/jquery-2.1.4.min.js"></script>' ?>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class="text-center">Editing Match</h2><?

			$match = $match->row();
			$winner = 'Waiting...';
			foreach ($tmhistories->result() as $tmhistory) {
				if ($match->id == $tmhistory->idmatch) {
					foreach ($teams->result() as $team) {
						if ($team->id == $tmhistory->idteam && $tmhistory->side == 1) {
							$teamBlue = $team->shortname;
							$idTeamBlue = $team->id;
							if ($tmhistory->winner == 1) {
								$winner = $team->shortname;
							}
						}
						if ($team->id == $tmhistory->idteam && $tmhistory->side == 0) {
							$teamRed = $team->shortname;
							$idTeamRed = $team->id;
							if ($tmhistory->winner == 1) {
								$winner = $team->shortname;
							}
						}
					}
				}
			}?>

			<h4 class="text-center"><? echo $teamBlue ." vs ". $teamRed ?></h4>

			<div class="col-xs-12">
				<div class="col-xs-4 text-center"><b>Date:</b> <? echo $match->date; ?></div>
				<div class="col-xs-4 text-center"><b>Seasson:</b> <? echo $match->season; ?></div>
				<div class="col-xs-4 text-center"><b>Split:</b> <? echo $match->split; ?></div>

				<hr>

				<h4 class="text-center">Winner: </h4><p class="text-center"><? echo $winner; ?></p>

				<hr>

				<div class="col-sm-6">
					<h4 class="text-center">Team Blue</h4>

					<table class="table table-striped table-bordered">
						<thead class="thead-inverse">
							<tr>
								<th>Summoner</th>
								<th>K</th>
								<th>D</th>
								<th>A</th>
								<th>MVP</th>
							</tr>
						</thead>
						<tbody>
							<tr class="table-info"><?
								foreach ($pmhistories->result() as $pmHistory){
									if ($pmHistory->idmatch == $match->id) {
										foreach ($players->result() as $player) {
											if ($player->id == $pmHistory->idplayer && $player->idteam == $idTeamBlue) {
												echo "
														<td>" .$player->summoner. "</td>
														<td>" .$pmHistory->kills. "</td>
														<td>" .$pmHistory->deaths. "</td>
														<td>" .$pmHistory->assists. "</td>
														<td>" .$pmHistory->mvp. "</td>" ;
											}
										}
									}
								}
							?>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="col-sm-6">
					<h4 class="text-center">Team Red</h4>

					<table class="table table-striped table-bordered">
						<thead class="thead-inverse">
							<tr>
								<th>Summoner</th>
								<th>K</th>
								<th>D</th>
								<th>A</th>
								<th>MVP</th>
							</tr>
						</thead>
						<tbody>
							<tr class="table-info"><?
								foreach ($pmhistories->result() as $pmHistory){
									if ($pmHistory->idmatch == $match->id) {
										foreach ($players->result() as $player) {
											if ($player->id == $pmHistory->idplayer && $player->idteam == $idTeamRed) {
												echo "
														<td>" .$player->summoner. "</td>
														<td>" .$pmHistory->kills. "</td>
														<td>" .$pmHistory->deaths. "</td>
														<td>" .$pmHistory->assists. "</td>
														<td>" .$pmHistory->mvp. "</td>" ;
											}
										}
									}
								}
							?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<a href="<? echo base_url() ?>index.php/cAdmin/index" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Back</a>
		</div>
	</div>
</body>
</html>
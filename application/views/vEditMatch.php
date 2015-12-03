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
			foreach ($tmhistories->result() as $tmhistory) {
				if ($match->id == $tmhistory->idmatch) {
					foreach ($teams->result() as $team) {
						if ($team->id == $tmhistory->idteam && $tmhistory->side == 1) {
							$teamBlue = $team->shortname;
						}
						if ($team->id == $tmhistory->idteam && $tmhistory->side == 0) {
							$teamRed = $team->shortname;
						}
					}
				}
			}?>

			<h4 class="text-center"><? echo $teamBlue ." vs ". $teamRed ?></h4>

			<div class="col-xs-12">
				<div id="form-edit-Match">
					<?= form_open(base_url()."index.php/cAdmin/updateMatch") ?>
						<div class="form-group col-sm-12">
	                    	<input id="txtIdMatch" name="txtIdMatch" class="form-control" type="hidden" value="<? echo $match->id ?>" required />
	                   	</div>

						<div class="form-group col-sm-6">
							<label for="txtMatchDate">Match Date: <? echo $match->date; ?></label>
	                    	<input id="txtMatchDate" name="txtMatchDate" class="form-control" maxlenght="50" placeholder="Macth Date" type="date" required />
	                   	</div>

	                   	<div class="form-group col-sm-6">
							<label for="txtMatchSeasson">Match Seasson: <? echo $match->season; ?></label>
	                    	<select id="txtMatchSeasson" name="txtMatchSeasson" class="form-control" placeholder="Seasson" required>
								<option value='5'>Seasson 5</option>
								<option value='6'>Seasson 6</option>
							</select>
	                   	</div>

	                   	<div class="form-group col-sm-6">
							<label for="txtMatchSplit">Match Split: <? echo $match->split; ?></label>
	                    	<select id="txtMatchSplit" name="txtMatchSplit" class="form-control" placeholder="Split" required>
								<option value='spring'>Spring</option>
								<option value='summer'>Summer</option>
							</select>
	                   	</div>

	                   	<div class="clearfix"></div>

	                   	<input type="submit" class="btn btn-success" value="Save"/>
	                   	<input type="reset" class="btn btn-warning" value="Clear"/>
	                   	<a href="<? echo base_url() ?>index.php/cAdmin/index" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Back</a>
                   	<?= form_close() ?>

                   	<div id="error">
						<? echo validation_errors(); ?>
					</div>
	            </div>
			</div>
		</div>
	</div>
</body>
</html>
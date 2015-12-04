<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 * Description of cAdmin
 *
 * @author 5-09
 */

class cAdmin extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->database();

        $this->load->helper(array("form", "url"));
        $this->load->library(array('form_validation'));

        $this->load->model("mAdmin");
    }

    public function index(){
        $leagues = $this->mAdmin->seeAllFields("league");
        $teams = $this->mAdmin->seeAllFields("team");
        $regions = $this->mAdmin->seeAllFields("region");
        $players = $this->mAdmin->seeAllFields("player");
        $matchs = $this->mAdmin->seeAllFields("match");
        $teamMatchHistories = $this->mAdmin->seeAllFields("teammatchhistory");

        $info = array(
            'leagues'       =>  $leagues,
            'teams'         =>  $teams,
            'regions'       =>  $regions,
            'players'       =>  $players,
            'matchs'        =>  $matchs,
            'tMHistories'   =>  $teamMatchHistories,
        );

        $this->load->view('vAdminHome', $info);
    }


    //---------------- Team Methods -------------------//
    public function addTeam(){
        $data = array(
            'name'      => $this->input->post("txtTeamName"),
            'shortname' => $this->input->post("txtTeamShortName"),
            'idleague'  => $this->input->post("txtTeamLeague"),
        );
        $this->mAdmin->addField("team", $data);
        $this->index();
    }

    public function editTeam($id){
        $team = $this->mAdmin->seeField("team", "id", $id);
        $leagues = $this->mAdmin->seeAllFields("league");

        if ($team->num_rows() != 0) {
            $info = array(
                'team'      =>  $team,
                'leagues'   => $leagues,
            );

            $this->load->view('vEditTeam', $info);
        }
        else{
            $this->index();
        }
    }

    public function updateTeam(){
        $id = $this->input->post("txtIdTeam");
        $data = array(
            'name'      => $this->input->post("txtTeamName"),
            'shortname' => $this->input->post("txtTeamShortName"),
            'idleague'  => $this->input->post("txtTeamLeague"),
        );
        $this->mAdmin->modifyField("team", $id, $data);
        $this->index();
    }

    public function activateTeam($id){
        $data = array(
            'active' => 1,
        );
        $this->mAdmin->modifyField("team", $id, $data);
        $this->index();
    }

    public function desactivateTeam($id){
        $data = array(
            'active' => 0,
        );
        $this->mAdmin->modifyField("team", $id, $data);
        $this->index();
    }
    //-------------- End Team Methods -----------------//


    //---------------- Player Methods -------------------//
    public function addPlayer(){
        $data = array(
            'summoner'  => $this->input->post("txtSummonerName"),
            'idteam'    => $this->input->post("txtPlayerTeam"),
        );
        $this->mAdmin->addField("player", $data);
        $this->index();
    }

    public function editPlayer($id){
        $player = $this->mAdmin->seeField("player", "id", $id);
        $teams = $this->mAdmin->seeAllFields("team");

        if ($player->num_rows() != 0) {
            $info = array(
                'player'    =>  $player,
                'teams'     =>  $teams,
            );

            $this->load->view('vEditPlayer', $info);
        }
        else{
            $this->index();
        }
    }

    public function updatePlayer(){
        $id = $this->input->post("txtIdPlayer");
        $data = array(
            'summoner'      =>  $this->input->post("txtPlayerSummoner"),
            'idteam'    =>  $this->input->post("txtPlayerTeam"),
        );
        $this->mAdmin->modifyField("player", $id, $data);
        $this->index();
    }

    public function activatePlayer($id){
        $data = array(
            'active' => 1,
        );
        $this->mAdmin->modifyField("player", $id, $data);
        $this->index();
    }

    public function desactivatePlayer($id){
        $data = array(
            'active' => 0,
        );
        $this->mAdmin->modifyField("player", $id, $data);
        $this->index();
    }
    //-------------- End Player Methods -----------------//


    //---------------- Match Methods -------------------//
    public function addMatch(){
        $dataMatch = array(
            'date'      => $this->input->post("txtMatchDate"),
            'season'    => $this->input->post("txtMatchSeasson"),
            'split'     => $this->input->post("txtMatchSplit"),
        );
        $this->mAdmin->addField("match", $dataMatch);
        $match = $this->mAdmin->seeAllFields("match");
        $match = $match->last_row();

        $dataBlueTeam = array(
            'idmatch'   => $match->id,
            'idteam'    => $this->input->post("txtMatchTeamBlue"),
            'side'      => 1
        );

        $dataRedTeam = array(
            'idmatch'   => $match->id,
            'idteam'    => $this->input->post("txtMatchTeamRed"),
            'side'      => 0
        );
        $this->mAdmin->addField("teammatchhistory", $dataBlueTeam);
        $this->mAdmin->addField("teammatchhistory", $dataRedTeam);
        $players = $this->mAdmin->seeAllFields("player");

        foreach ($players->result() as $player){
            if ($player->idteam == $this->input->post("txtMatchTeamBlue") || $player->idteam == $this->input->post("txtMatchTeamRed")){
                $dataPlayer = array(
                    'idplayer'  => $player->id,
                    'idmatch'   => $match->id,
                );

                $this->mAdmin->addField("playermatchhistory", $dataPlayer);
            }
        }
        $this->index();
    }

    public function seeMatch($id){
        $match = $this->mAdmin->seeField("match", "id", $id);
        $teams = $this->mAdmin->seeAllFields("team");
        $players = $this->mAdmin->seeAllFields("player");
        $tmHistory = $this->mAdmin->seeAllFields("teammatchhistory");
        $pmHistory = $this->mAdmin->seeAllFields("playermatchhistory");

        if ($match->num_rows() != 0) {
            $info = array(
                'match'         =>  $match,
                'teams'         =>  $teams,
                'players'       =>  $players,
                'tmhistories'   =>  $tmHistory,
                'pmhistories'   =>  $pmHistory,
            );

            $this->load->view('vSeeMatch', $info);
        }
        else{
            $this->index();
        }
    }

    public function editMatch($id){
        $match = $this->mAdmin->seeField("match", "id", $id);
        $teams = $this->mAdmin->seeAllFields("team");
        $tmHistory = $this->mAdmin->seeAllFields("teammatchhistory");

        if ($match->num_rows() != 0) {
            $info = array(
                'match'         =>  $match,
                'teams'         =>  $teams,
                'tmhistories'   =>  $tmHistory,
            );

            $this->load->view('vEditMatch', $info);
        }
        else{
            $this->index();
        }
    }

    public function updateMatch(){
        $id = $this->input->post("txtIdMatch");
        $data = array(
            'date'      => $this->input->post("txtMatchDate"),
            'season'    => $this->input->post("txtMatchSeasson"),
            'split'     => $this->input->post("txtMatchSplit"),
        );
        $this->mAdmin->modifyField("match", $id, $data);
        $this->index();
    }

    public function activateMatch($id){
        $data = array(
            'active' => 1,
        );
        $this->mAdmin->modifyField("match", $id, $data);
        $this->index();
    }

    public function desactivateMatch($id){
        $data = array(
            'active' => 0,
        );
        $this->mAdmin->modifyField("match", $id, $data);
        $this->index();
    }

    public function deleteMatch($id){
        $this->mAdmin->deleteField("match", $id);
        $this->index();
    }
    //-------------- End Match Methods -----------------//



    //---------------- League Methods -------------------//
    public function addLeague(){
        $data = array(
            'idregion'  => $this->input->post("txtRegionLeague"),
            'name'    => $this->input->post("txtLeagueName"),
        );
        $this->mAdmin->addField("league", $data);
        $this->index();
    }

    public function editLeague($id){
        $league = $this->mAdmin->seeField("league", "id", $id);
        $regions = $this->mAdmin->seeAllFields("region");

        if ($league->num_rows() != 0) {
            $info = array(
                'league'         =>  $league,
                'regions'         =>  $regions,
            );

            $this->load->view('vEditLeague', $info);
        }
        else{
            $this->index();
        }
    }

    public function updateLeague(){
        $id = $this->input->post("txtIdLeague");
        $data = array(
            'idregion'      => $this->input->post("txtRegionLeague"),
            'name'    => $this->input->post("txtLeagueName"),
        );
        $this->mAdmin->modifyField("league", $id, $data);
        $this->index();
    }

    public function activateLeague($id){
        $data = array(
            'active' => 1,
        );
        $this->mAdmin->modifyField("league", $id, $data);
        $this->index();
    }

    public function desactivateLeague($id){
        $data = array(
            'active' => 0,
        );
        $this->mAdmin->modifyField("league", $id, $data);
        $this->index();
    }
    //-------------- End League Methods -----------------//

    //---------------- League Methods -------------------//
    public function addRegion(){
        $data = array(
            'name'    => $this->input->post("txtRegionName"),
        );
        $this->mAdmin->addField("region", $data);
        $this->index();
    }

    public function editRegion($id){
        $region = $this->mAdmin->seeField("region", "id", $id);

        if ($region->num_rows() != 0) {
            $info = array(
                'region'         =>  $region,
            );

            $this->load->view('vEditRegion', $info);
        }
        else{
            $this->index();
        }
    }

    public function updateRegion(){
        $id = $this->input->post("txtIdRegion");
        $data = array(
            'name'    => $this->input->post("txtRegionName"),
        );
        $this->mAdmin->modifyField("region", $id, $data);
        $this->index();
    }

    public function activateRegion($id){
        $data = array(
            'active' => 1,
        );
        $this->mAdmin->modifyField("region", $id, $data);
        $this->index();
    }

    public function desactivateRegion($id){
        $data = array(
            'active' => 0,
        );
        $this->mAdmin->modifyField("region", $id, $data);
        $this->index();
    }
    //-------------- End League Methods -----------------//
}?>

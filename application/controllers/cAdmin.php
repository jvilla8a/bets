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
	public function __construct() 
    {
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
    //-------------- End Match Methods -----------------//
}
?>

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
        $this->form_validation->set_rules("txtTeamName", "Name", "trim|required|max_length[50]");
        $this->form_validation->set_rules("txtTeamShortName", "Short Name", "trim|required|max_length[3]|min_length[2]");
        $this->form_validation->set_rules("txtTeamLeague", "League", "required");

        $leagues = $this->mAdmin->seeAllFields("league");
        $teams = $this->mAdmin->seeAllFields("team");
        $regions = $this->mAdmin->seeAllFields("region");
        $players = $this->mAdmin->seeAllFields("player");

        $info = array(
            'leagues'   =>  $leagues,
            'teams'     =>  $teams,
            'regions'   =>  $regions,
            'players'   =>  $players
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
        $idMatch = $this->mAdmin->seeAllFields("match");
        $players = $this->mAdmin->seeAllFields("player");
        $idMatch = $idMatch->num_rows();

        $dataMatch = array(
            'date'      => $this->input->post("txtMatchDate"),  
            'season'    => $this->input->post("txtMatchSeasson"),  
            'split'     => $this->input->post("txtMatchSplit"),  
        );
        $this->mAdmin->addField("match", $dataMatch);

        $dataBlueTeam = array(
            'idmatch'   => ++$idMatch,
            'idteam'    => $this->input->post("txtMatchTeamBlue"),
            'side'      => 1
        );

        $dataRedTeam = array(
            'idmatch'   => $idMatch,
            'idteam'    => $this->input->post("txtMatchTeamRed"),
            'side'      => 0
        );
        $this->mAdmin->addField("teammatchhistory", $dataBlueTeam);
        $this->mAdmin->addField("teammatchhistory", $dataRedTeam);

        foreach ($players->result() as $player) {
            if ($player->idteam == $this->input->post("txtMatchTeamBlue") || $team->idteam == $this->input->post("txtMatchTeamRed")) {
                $dataPlayer = array(
                    'idplayer'  => $player->id,
                    'idmatch'   => $idMatch,
                );

                $this->mAdmin->addField("playermatchhistory", $dataPlayer);
            }
        }

        $this->index();
    }
    //-------------- End Match Methods -----------------//
}
?>

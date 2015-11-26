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

        $info = array(
            'leagues'   =>  $leagues,
            'teams'     =>  $teams,
            'regions'   =>  $regions,
            'player'    =>  $players
        );

        $this->load->view('vAdminHome', $info);
	}

    //---------------- League Methods -------------------//
    //-------------- End League Methods -----------------//
}
?>

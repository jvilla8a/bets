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
        
        $this->load->helper(array("form", "url"));
        $this->load->library(array('form_validation'));

        $this->load->model("mAdmin");
    }

	public function index(){
		$this->load->view('vAdminHome');
        $leagues = $this->seeAllFields();
	}

    //---------------- League Methods -------------------//
    public function seeAllLeagues(){
        return $this->mAdmin->seeAllFields("league");
    }
    //-------------- End League Methods -----------------//
}
?>

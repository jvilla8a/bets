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

class cSesion extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->database();

		$this->load->helper(array("form", "url"));
		$this->load->library(array('form_validation'));

		$this->load->model("mAdmin");
	}

	public function index(){
		$this->load->view('vLogin');
	}

	public function login(){
		$nick = $this->input->post("txtNickname");
		$pass = $this->input->post("txtPassword");
		$user = $this->mAdmin->seeField("user", "nick", $nick);
		if($user->num_rows() == 0)
		{
			$this->index();
		}
		else
		{
			$infoUser = $user->row();
			if ($infoUser->nick == $nick && $infoUser->password == $pass && $infoUser->type == 1) {
				$info = array(
					'nick' 			=> $nick,
					'password' 	=> $pass,
				);
				// $this->session->set_userdata($info);
				redirect("/cAdmin/index");
			}
			else{
				$this->index();
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("/formulario/index");
	}
}?>

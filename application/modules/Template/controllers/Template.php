<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {

	/**
	 * Template main controller.
	 *
	 * @author Kevin Marete
	 */
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('template_model');
	}

	public function load_view($data = array())
	{	
		if($this->session->userdata('EID')){
			$data['menus'] = $this->template_model->get_user_menus();
			$data['sidemenus'] = $this->template_model->get_user_side_menus();
			$this->load->view('template_view', $data);
		}else{
            redirect("login");
        }
	}

}

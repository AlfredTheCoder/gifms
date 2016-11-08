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
			$user_level = $this->session->userdata('Description');
			if($user_level != 'System Administrator'){
				$data['menus'] = $this->template_model->get_user_menus();
				$data['sidemenus'] = $this->format_sidemenus($this->template_model->get_user_side_menus());
			}
			$this->load->view('template_view', $data);
		}else{
            redirect("login");
        }
	}

	public function format_sidemenus($sidemenus){
		$formatted_menus = array();
		foreach ($sidemenus as $key => $sidemenu) {
			$formatted_menus[$sidemenu['Menu']] = str_ireplace('.x', '', $sidemenu['URL']);
        }
        return $formatted_menus;        
	}

}

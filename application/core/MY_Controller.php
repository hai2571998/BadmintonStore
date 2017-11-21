<?php
	class MY_Controller extends CI_Controller{
		//bien gui du lieu
		public $data = array();
		
		function __construct(){
			parent::__construct();
			$controller = $this->uri->segment(1);
			switch($controller){
				case 'admin': {
					$this->load->helper('admin');
					$this->_check_login();
					break;
				} default: {
					$this->load->model('catalog_model');
					$input = array();
					$input['where'] = array('parent_id' => 0);
					$catalog_list = $this->catalog_model->get_list($input);
					
					foreach($catalog_list as $row){
						$input['where'] = array('parent_id' => $row->id);
						$subs = $this->catalog_model->get_list($input);
						$row->subs = $subs;
					}
					$this->data['catalog_list'] = $catalog_list;

					//lay tat ca bai viet moi nhat
					$this->load->model('news_model');
					$input = array();
					$input['limit'] = array(5, 0);
					$news_list = $this->news_model->get_list($input);
					$this->data['news_list'] = $news_list;

					$this->load->library('cart');
					$total_items = $this->cart->total_items();
					$this->data['total_items'] = $total_items;
				}
			}
		}
		
		private function _check_login(){
			$controller = $this->uri->rsegment('1');
			$controller = strtolower($controller);
			$login = $this->session->userdata('login');
			if(!$login && $controller != 'login'){
				redirect(admin_url('login'));
			}
			if($login && $controller == 'login'){
				redirect(admin_url('home'));
			}
		}
	}
?>
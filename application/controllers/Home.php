<?php
	class Home extends MY_Controller {
		function index(){
			//lay ds slide
			$this->load->model('slide_model');
			$slide_list = $this->slide_model->get_list();
			$this->data['slide_list'] = $slide_list;

			//lay ds san pham moi
			$this->load->model('product_model');
			$input = array();
			$input['limit'] = array(5, 0);
			$product_list = $this->product_model->get_list($input);
			$this->data['product_list'] = $product_list;

			$input['order'] = array('buyed', 'DESC');
			$product_buy = $this->product_model->get_list($input);
			$this->data['product_buy'] = $product_buy;

			$this->data['temp'] = 'site/home/index';
			$this->load->view('site/layout', $this->data);
		}
	}
?>
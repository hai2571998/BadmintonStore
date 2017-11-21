<?php
class User extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	function register()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
			$this->form_validation->set_rules('re_password', 'Nhập lại Password', 'matches[password]');
			$this->form_validation->set_rules('phone', 'Số điện thoại', 'required|max_length[11]');
			$this->form_validation->set_rules('address', 'Địa chỉ', 'required');

			if ($this->form_validation->run()) {
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$data = array(
					'name' => $name,
					'email' => $username,
					'password' => md5($password)
				);
				if ($this->admin_model->create($data)) {
					$this->session->set_flashdata('message', 'Thêm dữ liệu thành công');
				} else {
					$this->session->set_flashdata('message', 'Thêm dữ liệu thất bại');
				}
				redirect(admin_url('admin'));
			}
		}
		$this->data['temp'] = 'site/user/register';
		$this->load->view('site/layout', $this->data);
	}
}
?>
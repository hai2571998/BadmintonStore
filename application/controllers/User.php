<?php
class User extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	function check_email()
	{
		$email = $this->input->post('email');
		$where = array('email' => $email);
		if ($this->user_model->check_exists($where)) {
			$this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
			return false;
		}
		return true;
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
				$password = $this->input->post('password');
				$password = md5($password);

				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'address' => $this->input->post('address'),
					'created' => now(),
					'password' => $password,
				);
				if ($this->user_model->create($data)) {
					$this->session->set_flashdata('message', 'Thêm thành viên thành công');
				} else {
					$this->session->set_flashdata('message', 'Thêm thành viên thất bại');
				}
				redirect(site_url());
			}
		}
		$this->data['temp'] = 'site/user/register';
		$this->load->view('site/layout', $this->data);
	}
}
?>
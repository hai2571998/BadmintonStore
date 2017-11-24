<?php
class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
    }

    function checkout()
    {
        $carts = $this->cart->contents();
        $total_items = $this->cart->total_items();
        if($total_items <= 0){
            redirect();
        }

        $total_amount = 0;
        foreach ($carts as $row) {
            $total_amount += $row['subtotal'];
        }
        $this->data['total_amount'] = $total_amount;

        $user_id = 0;
        $user = '';
        if ($this->session->userdata('user_id_login')) {
			$user_id = $this->session->userdata('user_id_login');
            $user = $this->user_model->get_info($user_id);
        }
		$this->data['user'] = $user;

        $this->load->library('form_validation');
		$this->load->helper('form');
		if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
			$this->form_validation->set_rules('phone', 'Số điện thoại', 'required|max_length[11]');
            $this->form_validation->set_rules('message', 'Ghi chú', 'required');
            $this->form_validation->set_rules('payment', 'Cổng thanh toán', 'required');

			if ($this->form_validation->run()) {
                $payment = $this->input->post('payment');
				$data = array(
                    'status' => 0, //chua thanh toan
                    'user_id' => $user_id,
					'user_name' => $this->input->post('name'),
                    'user_phone' => $this->input->post('phone'),
                    'user_email' => $this->input->post('email'),
                    'message' => $this->input->post('message'),
                    'amount' => $total_amount,
                    'payment' => $payment,
                    'created' => now(),
                );
                
                //them su lieu data vao transaction
                $this->load->model('transaction_model');
                $this->transaction_model->create($data);

                //lay ra id cua giao dich vua them vao
                $transaction_id = $this->db->insert_id();

                $this->load->model('order_model');
                foreach ($carts as $row) {
                    $data = array(
                        'transaction_id' => $transaction_id,
                        'product_id' => $row['id'],
                        'qty' => $row['qty'],
                        'amount' => $row['subtotal'],
                        'status' => '0',
                    );
                    $this->order_model->create($data);
                }
                //xoa toan bo gio hang
                $this->cart->destroy();
                if($payment == 'offline'){
                    $this->session->set_flashdata('message', 'Bạn đặt hàng thành công!');
                    redirect(site_url(''));
                } elseif (in_array($payment, array('baokim', 'nganluong'))) {
                    # code...
                }
			}
		}

        $this->data['temp'] = 'site/order/checkout';
        $this->load->view('site/layout', $this->data);
    }
}
?>
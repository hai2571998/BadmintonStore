<?php
    class Catalog extends MY_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('catalog_model');
        }

        function index(){
            $list = $this->catalog_model->get_list();
            $this->data['list'] = $list;
            
            $message = $this->session->flashdata('message');
			$this->data['message'] = $message;

            $this->data['temp'] = 'admin/catalog/index';
			$this->load->view('admin/main', $this->data);
        }

        function add(){
            $this->load->library('form_validation');
			$this->load->helper('form');
			if($this->input->post()){
				$this->form_validation->set_rules('name', 'Tên danh mục', 'required');

				if($this->form_validation->run()){
					$name = $this->input->post('name');
					$parent_id = $this->input->post('parent_id');
					$sort_order = $this->input->post('sort_order');
					$data = array(
						'name' => $name,
						'parent_id' => $parent_id,
						'sort_order' => intval($sort_order)
					);
					if($this->catalog_model->create($data)){
						$this->session->set_flashdata('message', 'Thêm dữ liệu thành công');
					} else {
						$this->session->set_flashdata('message', 'Thêm dữ liệu thất bại');
					}
					redirect(admin_url('catalog'));
				}
            }
            
            $input['where'] = array('parent_id' => 0);
            $list = $this->catalog_model->get_list($input);
            $this->data['list'] = $list;

			$this->data['temp'] = 'admin/catalog/add';
			$this->load->view('admin/main', $this->data);
        }

        function edit(){
            $this->load->library('form_validation');
			$this->load->helper('form');
			$id = $this->uri->rsegment('3');
			$id = intval($id);
			$info = $this->catalog_model->get_info($id);
			if(!$info){
				$this->session->set_flashdata('message', 'Không tồn tại danh mục này!');
				redirect(admin_url('catalog'));
			}
			$this->data['info'] = $info;
			if($this->input->post()){
				$this->form_validation->set_rules('name', 'Tên danh mục', 'required');

				if($this->form_validation->run()){
					$name = $this->input->post('name');
					$parent_id = $this->input->post('parent_id');
					$sort_order = $this->input->post('sort_order');

					$data = array(
                        'name' => $name,
                        'parent_id' => $parent_id,
                        'sort_order' => $sort_order
					);

					if($this->catalog_model->update($id, $data)){
						$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
					} else {
						$this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại');
					}
					redirect(admin_url('catalog'));
				}
				$password = $this->input->post('password');
			}
			$this->data['temp'] = 'admin/catalog/edit';
			$this->load->view('admin/main', $this->data);
        }

        function delete(){
			$id = $this->uri->rsegment('3');
			$this->del($id);
			$this->session->set_flashdata('message', 'Xóa danh mục thành công');
			redirect(admin_url('catalog'));
		}

		function delete_all(){
			$ids = $this->input->post('ids');
            foreach($ids as $id){
                $this->del($id, false);
            }
            $this->session->set_flashdata('message', 'Xóa danh mục thành công');
			redirect(admin_url('catalog'));
		}

		private function del($id, $redirect = true){
			$id = intval($id);
			
			$info = $this->catalog_model->get_info($id);
			if(!$info){
				$this->session->set_flashdata('message', 'Không tồn tại danh mục này!');
				if($redirect){
					redirect(admin_url('catalog'));
				} else {
					return false;
				}
			}
			$this->load->model('product_model');
			$product = $this->product_model->get_info_rule(array('catalog_id' => $id), 'id');
			if($product){
				$this->session->set_flashdata('message', 'Không thể xóa danh mục '.$info->name.', xóa tất cả sản phẩm trước khi xóa danh mục!');
				if($redirect){
					redirect(admin_url('catalog'));
				} else {
					return false;
				}
			}

			$catalog_check = $this->catalog_model->get_info_rule(array('parent_id' => $info->id,'id'));
			if ($catalog_check){
				$this->session->set_flashdata("message","Danh mục này có danh mục con");
				redirect(admin_url("catalog"));
			}
			$this->catalog_model->delete($id);
		}
    }
?>
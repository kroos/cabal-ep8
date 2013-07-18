<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shopadmin extends CI_Controller {
	//contructor => default utk semua function dlm controller nih...
	public function __construct() {
		parent::__construct();
		//mesti ikut peraturan ni..
		//user mesti log on kalau tidak redirect to index
		$gm = $this->cabal_character_table->GetWhere("CharacterIdx between ({$this->session->userdata('id_user')} * 8) and ({$this->session->userdata('id_user')} * 8 + 5) AND Nation = 3", NULL, NULL);
		if ($this->session->userdata('logged_in') === FALSE  && ($gm->num_rows() < 1) ) {
			redirect('/welcome/index', 'location');
		}

		//load model
		$this->load->model(array('cabal_charge_auth', 'bank', 'category', 'shopitems'));
	}

#############################################################################################################################
	public function home() {
		$cate = $this->uri->segment(3, 0);

		if($cate == 0) {
			if($this->category->GetAll(NULL, NULL)->num_rows() > 0) {
				foreach ($this->category->GetAll(NULL, NULL)->result() AS $d) {
					$f[$d->id] = $d->category;
				}
				reset($f);
				$firstKey = key($f); 
				$cate = $firstKey;
				redirect('shopadmin/home/'.$cate, 'location');
			} else {
				
			}
		}

		$data['cate'] = $this->category->GetAll(NULL, NULL);
		$data['query'] = $this->shopitems->GetWhere(array('Category' => $cate), NULL, NULL);
		$this->load->view('admin/shop', $data);
	}

	public function add_item() {
		$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
		if ($this->form_validation->run() == TRUE) {
			if($this->input->post('add_item', TRUE)) {
				$iname = $this->input->post('item_name', TRUE);
				$idesc = $this->input->post('item_desc', TRUE);
				$iid = $this->input->post('item_id', TRUE);
				$iopt = $this->input->post('item_opt', TRUE);
				$idura = $this->input->post('iduration', TRUE);
				$iimg = $this->input->post('item_img', TRUE);
				$ialz = $this->input->post('item_alz', TRUE);
				$icat = $this->input->post('item_cat', TRUE);
				$iavail = $this->input->post('item_avail', TRUE);

				$array = array(
								'Name' => $iname,
								'Description' => $idesc,
								'ItemIdx' => $iid,
								'DurationIdx' => $idura,
								'ItemOpt' => $iopt,
								'Image' => $iimg,
								'Honour' => 0,
								'Alz' => $ialz,
								'Category' => $icat,
								'Available' => $iavail
								);
				$t = $this->shopitems->insert($array);
				if($t) {
					$data['info'] = 'Adding the item complete';
				} else {
					$data['info'] = 'Please try again. Cant add the item';
				}
			}
		}
		$data['cate'] = $this->category->GetAll(NULL, NULL);
		$data['idur'] = $this->config->item('idur');
		$this->load->view('admin/add_item', $data);
	}

	public function edit_item() {
		$item = $this->uri->segment(3, 0);

		$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('edit_item', TRUE)) {
				$iname = $this->input->post('item_name', TRUE);
				$idesc = $this->input->post('item_desc', TRUE);
				$iid = $this->input->post('item_id', TRUE);
				$iopt = $this->input->post('item_opt', TRUE);
				$idura = $this->input->post('iduration', TRUE);
				$iimg = $this->input->post('item_img', TRUE);
				$ialz = $this->input->post('item_alz', TRUE);
				$icat = $this->input->post('item_cat', TRUE);
				$iavail = $this->input->post('item_avail', TRUE);

				$array = array(
						'Name' => $iname,
						'Description' => $idesc,
						'ItemIdx' => $iid,
						'DurationIdx' => $idura,
						'ItemOpt' => $iopt,
						'Image' => $iimg,
						'Honour' => 0,
						'Alz' => $ialz,
						'Category' => $icat,
						'Available' => $iavail
					);
				$y = $this->shopitems->update($array, array('Id' => $item));
				if($y) {
					$data['info'] = 'Item updated';
				} else {
					$data['info'] = 'Please try again. Cant udpate the item';
				}
			}
		}
		$data['edit'] = $this->shopitems->GetWhere(array('Id' => $item), NULL, NULL);
		$data['cate'] = $this->category->GetAll(NULL, NULL);
		$data['idur'] = $this->config->item('idur');
		$this->load->view('admin/edit_item', $data);
	}

	public function del_item() {
		$item = $this->uri->segment(3, 0);
		$d = $this->shopitems->delete(array('Id' => $item));
		if($d) {
			redirect('shopadmin/edit_item/'.$cate, 'location');
		}
	}

	public function category() {
		$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
		if ($this->form_validation->run() == TRUE) {
			if($this->input->post('save', TRUE)) {
				$cate = $this->input->post('cat', TRUE);
				$jk = $this->category->insert(array('category' => $cate));
				if($jk) {
					$data['info'] = 'Inserted new category';
				} else {
					$data['info'] = 'Please try again later';
				}
			}
		}
		$data['cate'] = $this->category->GetAll(NULL, NULL);
		$this->load->view('admin/category', $data);
	}

	public function del_category() {
		$id = $this->uri->segment(3, 0);
		$rg = $this->shopitems->GetWhere(array('Category' => $id), NULL, NULL);
		if($rg->num_rows() >= 1) {
			$data['info'] = 'You must delete all the items associate to this category';
		} else {
			$gh = $this->category->delete(array('id' => $id));
			if($gh) {
				redirect('shopadmin/category', 'location');
			} else {
				redirect('shopadmin/category', 'location');
			}
		}
	}
#############################################################################################################################
}
?>
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model(array('shopitems', 'cabal_charge_auth', 'bank', 'category'));
		$this->load->library('cart');

		//only buy from game
		if($this->session->userdata('logged_in') == TRUE) {
			redirect('cabal/index', 'location');
		}

		//authenticate
		$g = $this->cabal_auth_table->shopauth($this->uri->segment(3, 0), $this->input->ip_address(), $this->uri->segment(4, 0));
		if($this->uri->segment(2, 0) != 'unauthorised' && $g->row()->Ret != 0 && $g->row()->UserID == NULL) {
			redirect('shop/unauthorised/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 0), 'location');
		}

	}
#############################################################################################################################

	public function index() {
		//authenticate
		$v1 = $this->uri->segment(3, 0);
		$v2 = $this->uri->segment(4, 0);
		$v3 = $this->uri->segment(5, 0);


		if($v3 == 0) {
			foreach ($this->category->GetAll(NULL, NULL)->result() AS $d) {
				$f[$d->id] = $d->category;
			}
			reset($f);
			$firstKey = key($f); 
			$cate = $firstKey;
			redirect('shop/index/'.$v1.'/'.$v2.'/'.$cate, 'location');
		}
		$data['ty'] = $this->shopitems->GetWhere(array('Category' => $v3), NULL, NULL);
		$data['cate'] = $this->category->GetAll(NULL, NULL);
		$this->load->view('shop/shop', @$data);
	}

	public function detail() {
		//authenticate
		$v1 = $this->uri->segment(3, 0);
		$v2 = $this->uri->segment(4, 0);
		$v3 = $this->uri->segment(5, 0);
		$v4 = $this->uri->segment(6, 0);

		$data['item'] = $this->shopitems->GetWhere(array('Id' => $v4, 'Category' => $v3), NULL, NULL);
		$data['cate'] = $this->category->GetAll(NULL, NULL);

		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
		if ($this->form_validation->run() === TRUE) {
			if($this->input->post('add', TRUE)) {
				//add to cart
				// add the selected product to the cart
				$dataa = array
						(
							'id' => $this->input->post('product_id', TRUE),
							'qty' => $this->input->post('qty', TRUE),
							'price' => $this->input->post('product_price', TRUE),
							'name' => $this->input->post('product_name', TRUE),
							'options' => array()
						);
				//print_r($dataa);
				$fp = $this->cart->insert($dataa);
				if($fp) {
					redirect('shop/cart/'.$v1.'/'.$v2, 'location');
				}
			}
		}
		$this->load->view('shop/detail', $data);
	}

	public function cart() {
		//authenticate
		$v1 = $this->uri->segment(3, 0);
		$v2 = $this->uri->segment(4, 0);
		$v3 = $this->uri->segment(5, 0);
		$v4 = $this->uri->segment(6, 0);

		$data['item'] = $this->shopitems->GetWhere(array('Id' => $v4, 'Category' => $v3), NULL, NULL);
		$data['cate'] = $this->category->GetAll(NULL, NULL);

		if ($this->input->post('update', TRUE)) {
			for ($i = 1; $i <= $this->cart->total_items(); $i++) {
				$item = $this->input->post($i, TRUE);
				$dataa = array
								(
									'rowid' => $item['rowid'], 
									'qty' => $item['qty']
								);
				$this->cart->update($dataa);
			}
		}
		$data['cart'] = $this->cart->contents();
		$this->load->view('shop/cart', @$data);
	}

	public function checkout() {
		$this->load->model('mycashitem');
		//authenticate
		$v1 = $this->uri->segment(3, 0);
		$v2 = $this->uri->segment(4, 0);
		$v3 = $this->uri->segment(5, 0);
		$v4 = $this->uri->segment(6, 0);

		if($this->input->post('buy', TRUE)) {
			$bank = $this->input->post('bank', TRUE);
			$qtty = $this->input->post('qtty', TRUE);
			$id = $this->input->post('id', TRUE);

			//echo $this->cart->total().' = cart_total<br />';
			//echo $this->cart->format_number($this->cart->total()).' = format_number<br />';
			//echo $bank.' = bank<br />';
			//echo $this->cart->format_number($bank).' = bank format_number<br />';

			if ($bank < $this->cart->total()) {
				$data['info'] = 'Insufficient Alz';
			} else {
				$yu = $this->shopitems->GetWhere(array('Id' => $id), NULL, NULL);
				$quan = $yu->row()->Available;
				$ItemOpt = $yu->row()->ItemOpt;
				$DurationIdx = $yu->row()->DurationIdx;
				if($quan < $qtty) {
					$data['info'] = 'Insufficient item';
				} else {
					for($i = 1; $i <= $qtty; $i++) {
						$this->mycashitem->buy($v1, $id, $ItemOpt, $DurationIdx);
					}
					$bal = $bank - $this->cart->total();
					$bm = $this->bank->update_alz($v1, $bal);
					$bali = $quan - $qtty;
					$gh = $this->shopitems->update(array('Available' => $bali), array('Id' => $id));
					if ($bm && $gh) {
						$data['info'] = 'Success buying the items';
						$this->cart->destroy();
					} else {
						$data['info'] = 'Please try again';
					}
				}
			}
		}

		$data['item'] = $this->shopitems->GetWhere(array('Id' => $v4, 'Category' => $v3), NULL, NULL);
		$data['cate'] = $this->category->GetAll(NULL, NULL);
		$data['cart'] = $this->cart->contents();
		$this->load->view('shop/checkout', @$data);
	}
#############################################################################################################################
//unauthorised
	public function unauthorised() {
		$g = $this->cabal_auth_table->shopauth($this->uri->segment(3, 0), $this->input->ip_address(), $this->uri->segment(4, 0));
		if($g->row()->Ret == 1) {
			$data['info'] = 'No data at all. Close this shop';
		} else {
			if ($g->row()->Ret == 2) {
				$data['info'] = 'Incorrect user number. Close this shop';
			} else {
				if ($g->row()->Ret == 3) {
					$data['info'] = 'Not the same IP address. Close this shop';
				} else {
					if ($g->row()->Ret == 4) {
						$data['info'] = 'Incorrect Auth key. Close this shop';
					}
				}
			}
		}
		$this->load->view('shop/unauthorised', @$data);
	}

//http://localhost/cabal-ep8/trunk/shop/index/1/8DCA6D660DB9449FB7BF7D6FD5BBB31D.py
#############################################################################################################################
//error 404
	public function page_missing(){
		$this->load->view('error/404');
	}

#############################################################################################################################
}

/* End of file shop.php */
/* Location: ./application/controllers/shop.php */
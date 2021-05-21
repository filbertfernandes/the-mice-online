<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index() 
	{
		if($this->session->userdata('nickname')) {
			redirect('game');
			die;
		}
		
		$this->form_validation->set_rules('nickname', 'Nickname', 'required|trim|max_length[20]|is_unique[user.nickname]|alpha_dash', [
			'max_length' => 'The Nickname is too long.',
			'is_unique' => 'The Nickname has already been taken.',
			'alpha_dash' => 'The Nickname can\'t contain a space.'
		]);

		if($this->form_validation->run() == false) {
			$this->load->view('templates/header_login');
			$this->load->view('auth/login');
			$this->load->view('templates/footer');
		} else {
			$data = [
				'nickname' => htmlspecialchars($this->input->post('nickname', true)),
				'highscore' => 0
			];

			$this->db->insert('user', $data);
			$this->_login();
		}
	}

	private function _login() 
	{
		$nickname = $this->input->post('nickname');

		$user = $this->db->get_where('user', ['nickname' => $nickname])->row_array();
		
		// if the user exists 
		if($user) {
			$data = [
				'nickname' => $user['nickname'],
				'highscore' => $user['highscore']
			];
			$this->session->set_userdata($data);
			redirect('game');
		} else {
			redirect('auth');
		}
	}

	public function logout() {
		$this->session->unset_userdata('nickname');
		$this->session->unset_userdata('highscore');

		redirect('auth');
	}

}
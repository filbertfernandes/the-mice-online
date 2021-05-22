<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller 
{
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('nickname')) {
			redirect('auth');
		}
		$this->load->library('form_validation');
	}

	public function index() 
	{
		$data['title'] = 'Game';
		$data['user'] = $this->db->get_where('user', ['nickname' => $this->session->userdata('nickname')])->row_array();

		if( $this->input->post('highscore') ) {
			if($this->input->post('highscore') > $data['user']['highscore']) {
				$highscoreData = [
					'nickname' => $this->session->userdata('nickname'),
					'highscore' => $this->input->post('highscore')
				];
				$this->db->where('nickname', $this->session->userdata('nickname'));
				$this->db->update('user', $highscoreData);
			}
			$data['user'] = $this->db->get_where('user', ['nickname' => $this->session->userdata('nickname')])->row_array();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('game/index', $data);
		$this->load->view('templates/footer');
	}

	public function about() {
		$data['title'] = 'About';

		$this->load->view('templates/header', $data);
		$this->load->view('game/about');
		$this->load->view('templates/footer');
	}

	public function leaderboard() 
	{
		$data['title'] = 'Leaderboard';
		$this->load->model('Game_model');
		$data['users'] = $this->Game_model->getAllUserByHighscore();

		$this->load->view('templates/header', $data);
		$this->load->view('game/leaderboard', $data);
		$this->load->view('templates/footer');
	}

}
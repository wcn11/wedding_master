<?php defined("BASEPATH") OR exit("Engga script langsung");

/**
 * 
 */
class Home extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('user');
		$this->load->library('javascript');
	}
	function index(){
		$this->load->view("index");
	}

	function galeri(){
		$this->load->view("partial/galeri");
	}

}

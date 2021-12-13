<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends MY_Controller
{
	// 기본 생성자
	function __construct()
	{
		parent::__construct();

		$this->load->view('shopping/head_v');
		$this->load->model('shopping_m');
	}

	// 기본 컨트롤
	public function index()
	{
		$this->load->view(
			'shopping/index_v',
			array(
			)
		);
	}

	public function gets()
	{
		$items = $this->shopping_m->shopping_gets();

		return $items;

	}

	public function test()
	{
	
		$this->load->view(
			'shopping/ajax_test_v',
			array(
			)
		);
		
	}

	public function ajax_test()
{


	
}
}


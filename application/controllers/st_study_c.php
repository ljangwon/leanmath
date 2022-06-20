<?php
class St_study_c extends My_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->_require_login(site_url('st_study_c'), 10);

		$this->load->model('student_m');
		$this->load->model('st_study_m');
	}

	function index()
	{
		$this->get_list();
	}
	function ajax_get_list_all()
	{
		// POST data
		//$postData = $this->input->post();

		// Get data
		$data = $this->st_study_m->get_list();

		echo json_encode($data);
	}

	function ajax_get_list_by_st_id($st_id)
	{
		// POST data
		//$postData = $this->input->post();

		// Get data
		$data = $this->st_study_m->get_list_by_st_id($st_id);

		echo json_encode($data);
	}


	function ajax_st_study_modify()
	{
		$a = array(
			'id' => $this->input->post('id')
		);

		if ($p = $this->input->post('st_id')) {
			$a = array_merge(
				$a,
				array('st_id' => $p)
			);
		}

		if (($p = $this->input->post('show_flag')) != null) {

			$a = array_merge(
				$a,
				array('show_flag' => $p)
			);
		}

		if ($p = $this->input->post('course_cat')) {
			$a = array_merge(
				$a,
				array('course_cat' => $p)
			);
		}

		if ($p = $this->input->post('course_grade')) {
			$a = array_merge(
				$a,
				array('course_grade' => $p)
			);
		}

		if ($p = $this->input->post('book_name')) {
			$a = array_merge(
				$a,
				array('book_name' => $p)
			);
		}

		$data = $this->st_study_m->modify($a);

		echo json_encode($data);
	}

	function ajax_st_study_add()
	{
		$st_id = $this->session->userdata('st_id');

		$a = array(
			'st_id' => $st_id
		);

		if ($p = $this->input->post('course_cat')) {
			$a = array_merge(
				$a,
				array('course_cat' => $p)
			);
		}

		if ($p = $this->input->post('course_grade')) {
			$a = array_merge(
				$a,
				array('course_grade' => $p)
			);
		}

		if ($p = $this->input->post('book_name')) {
			$a = array_merge(
				$a,
				array('book_name' => $p)
			);
		}

		$data = $this->st_study_m->add($a);

		$this->session->set_flashdata('msg', '회원가입에 성공했습니다.');
		echo json_encode($data);
	}

	function ajax_st_study_delete()
	{
		$data = $this->st_study_m->delete(
			$this->input->post('id')
		);

		echo json_encode($data);
	}

	function get_list()
	{
		$this->load->view(
			'common/s1_head_v',
			array()
		);

		$this->load->view(
			'st_study/s1_head_v',
			array()
		);

		$students = $this->student_m->gets();

		$this->load->view(
			'common/s2_sidebar_v',
			array(
				'students' => $students
			)
		);

		$this->load->view(
			'common/s3_topbar_v',
			array()
		);

		$this->load->view(
			'st_study/s4_list_v',
			array()
		);

		$this->load->view(
			'common/s5_footer_v',
			array()
		);

		$this->load->view(
			'common/s6_common_modal_v',
			array()
		);

		$this->load->view(
			'st_study/s6_modal_v',
			array()
		);

		$this->load->view(
			'common/s7_common_script_v',
			array()
		);

		$this->load->view(
			'st_study/s7_script_v',
			array()
		);
	}
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fi extends MY_Controller
{
	// 기본 생성자
	function __construct()
	{
		parent::__construct();

		$this->load->view('common/head_v');
		$this->load->view('fi/header_v');

		$this->_require_login(site_url('/fi'));

		$this->load->model('fi_m');

		$fis = $this->fi_m->fi_gets();

		$this->load->view(
			'fi/sidebar_v',
			array(
				'fis' => $fis
			)
		);
	}

	// 교재 기본 컨트롤
	public function index()
	{
		if (!$fi_id = $this->session->userdata('fi_id')) {
			redirect(site_url('/fi/fi_summary'));
		} else {
			redirect(site_url('/fi/fi_get/' . $fi_id));
		}
	}

	// 교재 마스터 추가
	function fi_add()
	{
		$fi_id = $this->session->userdata('fi_id');

		$new_fi_id = $this->fi_m->fi_add(
			array(
				'grade1' => $this->input->post('grade1'),
				'grade2' => $this->input->post('grade2'),
				'name' => $this->input->post('name'),
			)
		);

		if (!$new_fi_id) {
			alert("교재 추가 실패했습니다.", site_url('/fi/fi_get/' . $fi_id));
		} else {

			alert("교재 추가 성공했습니다.", site_url('/fi/fi_get/' . $new_fi_id));
		}
	}

		// 교재 현황 요약
		function shopping()
		{
			$this->load->view('shopping/index.html');
	
			// footer
			$this->load->view('common/footer_v');
		}

	// 교재 현황 요약
	function fi_summary()
	{
		$fi_count_m1_1 = $this->fi_m->fi_get_count_option(
			array(
				'grade1' => '중등',
				'grade2' => '1-1',
				'flag' => '1'
			)
		);
		$this->load->view(
			'fi/summary_v',
			array(
				'fi_count_m1_1' => $fi_count_m1_1
			)
		);

		// footer
		$this->load->view('common/footer_v');
	}

	// 교재 상세화면 
	function fi_get($fi_id)
	{
		if (empty($fi_id)) {
			$fi_id = $this->session->userdata('fi_id');
		} else {
			$this->session->set_userdata('fi_id', $fi_id);
		}

		if (empty($fi_id)) {
			alert('fi_id의 값이 없습니다', site_url('/fi'));
		}

		$this->load->helper(array('HTML', 'korean'));

		// 교재 Data 로드하기 
		$fi = $this->fi_m->fi_get($fi_id);

		// 단원 Data 로드하기 
		$cashs = $this->fi_m->cash_gets($fi_id);

		// main 
		$this->load->view('fi/fi_v', array(
			'fi' => $fi,
			'cashs' => $cashs
		));

		// footer
		$this->load->view('common/footer_v');
	}

	// 교재 마스터 수정 
	function fi_modify()
	{
		$fi_id = $this->session->userdata('fi_id');

		$result = $this->fi_m->fi_modify(
			array(
				'id' => $this->input->post('id'),
				'grade1' => $this->input->post('grade1'),
				'grade2' => $this->input->post('grade2'),
				'name' => $this->input->post('name'),
				'level' => $this->input->post('level'),

				'cash_num' => $this->input->post('cash_num'),
				'memo' => $this->input->post('memo'),
				'flag' => $this->input->post('flag')
			)
		);

		if (!$result) {
			alert("교재 마스터 업데이트가 실패했습니다.", site_url('/fi/fi_get/' . $fi_id));
		} else {
			alert("교재 마스터 업데이트가 성공했습니다.", site_url('/fi/fi_get/' . $this->input->post('id')));
		}
	}

	// 교재 마스터 삭제
	function fi_delete()
	{
		$fi_id = $this->input->post('fi_id');

		$this->fi_m->fi_delete($fi_id);
		$this->session->set_userdata('fi_id', '');
		redirect(site_url('/fi'));
	}
	// 교재 마스트 컨트롤러 끝

	// 단원 컨트롤러 시작
	// 단원 추가
	function cash_add()
	{
		$fi_id = $this->session->userdata('fi_id');

		$result = $this->fi_m->cash_add(
			array(
				'fi_id' => $fi_id
			)
		);

		if (!$result) {
			alert("단원 추가 실패했습니다.", site_url('/fi/fi_get/' . $fi_id));
		} else {
			alert("단원 추가 성공했습니다.", site_url('/fi/fi_get/' . $fi_id));
		}
	}

	// 단원 추가
	function cash_add6()
	{
		$fi_id = $this->session->userdata('fi_id');

		$result = $this->fi_m->cash_add6(
			array(
				'fi_id' => $fi_id
			)
		);

		if (!$result) {
			alert("단원6 추가 실패했습니다.", site_url('/fi/fi_get/' . $fi_id));
		} else {
			alert("단원6 추가 성공했습니다.", site_url('/fi/fi_get/' . $fi_id));
		}
	}

	// 단원 추가
	function cash_add9()
	{
		$fi_id = $this->session->userdata('fi_id');

		$result = $this->fi_m->cash_add9(
			array(
				'fi_id' => $fi_id
			)
		);

		if (!$result) {
			alert("단원9 추가 실패했습니다.", site_url('/fi/fi_get/' . $fi_id));
		} else {
			alert("단원9 추가 성공했습니다.", site_url('/fi/fi_get/' . $fi_id));
		}
	}

	// 단원 수정
	function cash_modify()
	{
		$result = $this->fi_m->cash_modify(
			array(
				'id' => $this->input->post('id'),
				'fi_id' => $this->input->post('fi_id'),
				'num' => $this->input->post('num'),
				'name' => $this->input->post('name')
			)
		);



		if (!$result) {
			alert("단원 업데이트가 실패했습니다.", site_url('/fi/fi_get/' . $this->input->post('fi_id')));
		} else {
			alert("단원 업데이트가 성공했습니다.", site_url('/fi/fi_get/' . $this->input->post('fi_id')));
		}
	}

	// 단원 삭제
	function cash_delete($cash_id)
	{
		$fi_id = $this->session->userdata('fi_id');

		$result = $this->fi_m->cash_delete($cash_id);

		if (!$result) {
			alert("단원 삭제 실패했습니다.", site_url('/fi/fi_get/' . $fi_id));
		} else {
			alert("단원 삭제 성공했습니다.", site_url('/fi/fi_get/' . $fi_id));
		}
	}
	// 단원 컨트롤러 end
}

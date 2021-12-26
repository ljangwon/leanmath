<?php
class Kakao extends My_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->_require_login(site_url('student2'), 10);

		$this->load->model('student_m');
	}

	function index()
	{
		$this->load->view(
			'common/s1_head_v',
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
			'student2/s4_student_list_v',
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
			'student2/s6_student2_modal_v',
			array()
		);

		$this->load->view(
			'common/s7_common_script_v',
			array()
		);

		$this->load->view(
			'student2/s7_student2_script_v',
			array()
		);
	}

	function get_all()
	{

		$this->load->view(
			'common/s1_head_v',
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
			'student2/s4_none_student_v',
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
			'student2/s6_student2_modal_v',
			array()
		);

		$this->load->view(
			'common/s7_common_script_v',
			array()
		);

		$this->load->view(
			'student2/s7_student2_script_v',
			array()
		);
	}

	// create
	function st_add()
	{
		$new_st_id = $this->student_m->add(
			array(
				'name' => $this->input->post('name'),
				'class_name' => $this->input->post('class_name'),
				'study_memo' => '2021년 12월 17일 업데이트

초4 홍길동 학습 기록 공유드립니다.

<자기주도 학습시간계획>
월(2시간), 화(1시간), 수(1시간), 목(1시간), 금(2시간), 토(1시간), 일(0시간) 주당 총 8시간

<레벨테스트>
초4 (3월) 100점

<교재진행사항>
1) 연산선행 
- 초4-1(??교재) 총 6단원 - 진행중

- 다음교재 초4-1(??교재) 예정

2) 개념선행
- 초4-1(??교재) 총 6단원 - 진행중

- 다음교재 초4-1(??교재) 예정

3) 현행 심화 
- 초4-1(??교재) 총 6단원 - 진행중

- 다음교재 초4-1(??교재) 예정

<단원평가 결과>
- 초4-2 기본과정 - 진행중
1단원(0개/10문제) 

<학습주안점>
- 자기주도학습체계를 성실히 잘 따르고 있음.'
			)
		);

		if (!$new_st_id) {
			alert("학생 추가 실패했습니다.", site_url('/student2'));
		} else {

			alert("학생 추가 성공했습니다.", site_url('/student2/get_student/' . $new_st_id));
		}
	}

	// read list
	function ajax_student_list()
	{
		$data = $this->student_m->get_list(
			array(
				'status' => '재원'
			)
		);
		echo json_encode($data);
	}

	// read
	function get_student($st_id)
	{
		if (empty($st_id)) {
			$st_id = $this->session->userdata('st_id');
		} else {
			$this->session->set_userdata('st_id', $st_id);
		}

		if (empty($st_id)) {
			alert('st_id의 값이 없습니다', site_url('/student2'));
		}

		$this->load->view(
			'common/s1_head_v',
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

		// 학생 한명 Data 로드하기 
		$student = $this->student_m->get($st_id);
		if ($student) {
			$this->session->set_userdata('st_name', $student->name);
		} else {
			alert('해당하는 학생이 없습니다', site_url('/student2'));
		}

		$this->load->view(
			'student2/s4_student_detail_v',
			array(
				'student' => $student
			)
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
			'student2/s6_student2_modal_v',
			array()
		);

		$this->load->view(
			'common/s7_common_script_v',
			array()
		);

		$this->load->view(
			'student2/s7_student2_script_v',
			array()
		);
	}

	// update
	function st_modify()
	{
		$st_id = $this->session->userdata('st_id');

		$result = $this->student_m->modify(
			array(
				'id' => $this->input->post('id'),
				'name' => $this->input->post('name'),
				's_phone' => $this->input->post('s_phone'),
				'house' => $this->input->post('house'),
				'sibling_name' => $this->input->post('sibling_name'),

				'grade1' => $this->input->post('grade1'),
				'school_name' => $this->input->post('school_name'),
				'grade2' => $this->input->post('grade2'),
				'class_name' => $this->input->post('class_name'),

				'level1' => $this->input->post('level1'),
				'level2' => $this->input->post('level2'),
				'level3' => $this->input->post('level3'),

				'class_day1' => $this->input->post('class_day1'),
				'class_time1' => $this->input->post('class_time1'),
				'class_day2' => $this->input->post('class_day2'),
				'class_time2' => $this->input->post('class_time2'),
				'class_day3' => $this->input->post('class_day3'),
				'class_time3' => $this->input->post('class_time3'),

				'memo' => $this->input->post('memo'),
				'study_memo' => $this->input->post('study_memo'),
				'test_memo' => $this->input->post('test_memo'),
				'check_memo' => $this->input->post('check_memo'),
				'off_memo' => $this->input->post('off_memo'),

				'fees' => $this->input->post('fees'),
				'discount1' => $this->input->post('discount1'),
				'discount2' => $this->input->post('discount2'),
				'discount_memo' => $this->input->post('discount_memo'),
				'receipt_phone' => $this->input->post('receipt_phone'),
				'receipt_use' => $this->input->post('receipt_use'),

				'flag' => $this->input->post('flag'),
				'status' => $this->input->post('status'),
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'report_last_date' => $this->input->post('report_last_date')
			)
		);

		if (!$result) {
			alert("st 업데이트가 실패했습니다.", site_url('/student2/get_student/' . $st_id));
		} else {
			alert("st 업데이트가 성공했습니다.", site_url('/student2/get_student/' . $this->input->post('id')));
		}
	}

	function st_delete()
	{
		$student_id = $this->input->post('student_id');

		$this->student_m->delete($student_id);
		$this->session->set_userdata('st_id', '');
		redirect(site_url('/student2'));
	}
}

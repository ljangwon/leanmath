<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Book extends MY_Controller
{
	// 기본 생성자
	function __construct()
	{
		parent::__construct();

		$this->load->view('dashboard/head_v');
		$this->load->view('dashboard/header_v');

		$this->_require_login(site_url('/book'));

		$this->load->model('book_m');

		$books = $this->book_m->book_gets();

		$this->load->view('book/sidebar_v', array(
				'books' => $books
			)
		);
	}

	// 교재 기본 컨트롤
	public function index()
	{
		if( !$book_id = $this->session->userdata('book_id') )	{

			redirect( site_url('/book/book_summary') );

		}
		else {
			redirect( site_url('/book/book_get/' . $book_id) );
		}
	}

		// 교재 마스터 추가
		function book_add()
		{
				$book_id = $this->session->userdata('book_id');
	
				$new_book_id = $this->book_m->book_add( array(
							'grade1' => $this->input->post('grade1'),
							'grade2' => $this->input->post('grade2'),				
							'name' => $this->input->post('name'),
							)
					);
		
				if (!$new_book_id) {
					alert("교재 추가 실패했습니다.", site_url('/book/book_get/' . $book_id));
				} else {
	
					alert("교재 추가 성공했습니다.", site_url('/book/book_get/' . $new_book_id));
				}
		}

	// 교재 현황 요약
	function book_summary()
	{
			$book_count_m1_1 = $this->book_m->book_get_count_option( array(
						'grade1' => '중등',
						'grade2' => '1-1',
						'flag' => '1'
					)
			);
			$this->load->view('book/summary_v', array(
						'book_count_m1_1' => $book_count_m1_1
					)
			);

		// footer
		$this->load->view('default/footer_v');

	}

	// 교재 상세화면 
	function book_get($book_id)
	{
		if (empty($book_id)) {
			$book_id = $this->session->userdata('book_id');
		} else {
			$this->session->set_userdata('book_id', $book_id);
		}

		if (empty($book_id)) {
			alert('book_id의 값이 없습니다', site_url('/book'));
		}

		$this->load->helper(array('HTML', 'korean'));

		// 교재 Data 로드하기 
		$book = $this->book_m->book_get($book_id);

		// 단원 Data 로드하기 
		$chapters = $this->book_m->chapter_gets($book_id);

		// main 
		$this->load->view('book/book_v', array(
			'book' => $book,
			'chapters' => $chapters
		));

		// footer
		$this->load->view('dashboard/footer_v');
	}

	// 교재 마스터 수정 
	function book_modify()
	{
		$book_id = $this->session->userdata('book_id');

		$result = $this->book_m->book_modify(
			array(
				'id' => $this->input->post('id'),
				'grade1' => $this->input->post('grade1'),
				'grade2' => $this->input->post('grade2'),
				'name' => $this->input->post('name'),
				'level' => $this->input->post('level'),

				'chapter_num' => $this->input->post('chapter_num'),
				'memo' => $this->input->post('memo'),
				'flag' => $this->input->post('flag')
			)
		);

		if (!$result) {
			alert("교재 마스터 업데이트가 실패했습니다.", site_url('/book/book_get/' . $book_id) );
		} else {
			alert("교재 마스터 업데이트가 성공했습니다.", site_url('/book/book_get/' . $this->input->post('id')));
		}
	}

	// 교재 마스터 삭제
	function book_delete()
	{
			$book_id = $this->input->post('book_id');

			$this->book_m->book_delete($book_id);
			$this->session->set_userdata('book_id', '');
			redirect(site_url('/book'));
	}
	// 교재 마스트 컨트롤러 끝

  // 단원 컨트롤러 시작
	// 단원 추가
	function chapter_add()
	{
		$book_id = $this->session->userdata('book_id');

		$result = $this->book_m->chapter_add(
			array(
				'book_id' => $book_id
			)
		);

		if (!$result) {
			alert("단원 추가 실패했습니다.", site_url('/book/book_get/' . $book_id));
		} else {
			alert("단원 추가 성공했습니다.", site_url('/book/book_get/' . $book_id));
		}
	}

			// 단원 추가
			function chapter_add3()
			{
				$book_id = $this->session->userdata('book_id');
		
				$result = $this->book_m->chapter_add3(
					array(
						'book_id' => $book_id
					)
				);
		
				if (!$result) {
					alert("단원3 추가 실패했습니다.", site_url('/book/book_get/' . $book_id));
				} else {
					alert("단원3 추가 성공했습니다.", site_url('/book/book_get/' . $book_id));
				}
			}

		// 단원 추가
		function chapter_add6()
		{
			$book_id = $this->session->userdata('book_id');
	
			$result = $this->book_m->chapter_add6(
				array(
					'book_id' => $book_id
				)
			);
	
			if (!$result) {
				alert("단원6 추가 실패했습니다.", site_url('/book/book_get/' . $book_id));
			} else {
				alert("단원6 추가 성공했습니다.", site_url('/book/book_get/' . $book_id));
			}
		}

			// 단원 추가
	function chapter_add9()
	{
		$book_id = $this->session->userdata('book_id');

		$result = $this->book_m->chapter_add9(
			array(
				'book_id' => $book_id
			)
		);

		if (!$result) {
			alert("단원9 추가 실패했습니다.", site_url('/book/book_get/' . $book_id));
		} else {
			alert("단원9 추가 성공했습니다.", site_url('/book/book_get/' . $book_id));
		}
	}

	// 단원 수정
	function chapter_modify()
	{
		$result = $this->book_m->chapter_modify(
			array(
				'id' => $this->input->post('id'),
				'book_id' => $this->input->post('book_id'),
				'num' => $this->input->post('num'),
				'name' => $this->input->post('name')
			)
		);

		

		if (!$result) {
			alert("단원 업데이트가 실패했습니다.", site_url('/book/book_get/' . $this->input->post('book_id')));
		} else {
			alert("단원 업데이트가 성공했습니다.", site_url('/book/book_get/' . $this->input->post('book_id')));
		}
	}

	// 단원 삭제
	function chapter_delete($chapter_id)
	{
		$book_id = $this->session->userdata('book_id');

		$result = $this->book_m->chapter_delete($chapter_id);

		if (!$result) {
			alert("단원 삭제 실패했습니다.", site_url('/book/book_get/' . $book_id));
		} else {
			alert("단원 삭제 성공했습니다.", site_url('/book/book_get/' . $book_id));
		}
	}
	// 단원 컨트롤러 end
}
<?php
class Book_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	// 교재 마스터 CRUD start 
	function book_add($option=null)
	{	`
		$this->db->set('created', 'NOW()', false);

		if ($option['name']) {
			$this->db->set('name', $option['name']);
		}
		if ($option['grade1']) {
			$this->db->set('grade1', $option['grade1']);
		}
		if ($option['grade2']) {
			$this->db->set('grade2', $option['grade2']);
		}


		$this->db->insert('bk_master');
		$book_id = $this->db->insert_id();
		return $book_id;
	}

	function book_gets($option = null)
	{
		$this->db->select('*');
		$this->db->order_by('flag', 'ASC');
		$this->db->order_by('grade1', 'ASC');
		$this->db->order_by('grade2', 'ASC');
		$this->db->order_by('name', 'DESC');
		$this->db->order_by('created', 'ASC');

		if( $option ) {

			$this->db->where('grade1', $option['grade1']);

			$this->db->where('grade2', $option['grade2']);
		}

		$result = $this->db->get('bk_master')->result();;
		return $result;
	}

	function book_get_count_option($option=null)
	{
		$this->db->select('count(*) as cnt');
		$result = $this->db->get_where('bk_master',array(
				'grade1' => $option['grade1'],
				'grade2' => $option['grade2'],

			)
		)->row();
		return $result;
	}

	function book_get($book_id)
	{
		$this->db->select('*');

		$result = $this->db->get_where('bk_master', array(
			'id' => $book_id
		))->row();
		return $result;
	}

	// 수정 
	function book_modify($option=null)
	{
		$this->db->set('grade1', $option['grade1']);
		$this->db->set('grade2', $option['grade2']);
		$this->db->set('name', $option['name']);
		$this->db->set('level', $option['level']);

		$this->db->set('chapter_num', $option['chapter_num']);
		$this->db->set('memo', ltrim($option['memo']));
		$this->db->set('flag', $option['flag']);

		$this->db->where('id', $option['id']);

		$result = $this->db->update('bk_master');

		return $result;
	}

	// 삭제
	function book_delete($book_id)
	{
		$result = $this->db->delete('bk_master', array(
			'id' => $book_id
		));
		return $result;
	}
	// 교재 마스터 CRUD end

		// 단원 CRUD start 
		function chapter_add($option=null)
		{
			if ($option['book_id']) {
				$this->db->set('book_id', $option['book_id']);
			}
	
			$this->db->insert('bk_chapter');
			$chapter_id = $this->db->insert_id();
			return $chapter_id;
		}

		function chapter_add3($option=null)
		{
			if ($option['book_id']) {

				for( $i=0 ; $i < 3 ; $i++ ) {
					$this->db->set('book_id', $option['book_id']);
					$this->db->set('num', $i+1 );
					$this->db->insert('bk_chapter');
				}
			}

			$chapter_id = $this->db->insert_id();
			return $chapter_id;
		}

		function chapter_add6($option=null)
		{
			if ($option['book_id']) {

				for( $i=0 ; $i < 6 ; $i++ ) {
					$this->db->set('book_id', $option['book_id']);
					$this->db->set('num', $i+1 );
					$this->db->insert('bk_chapter');
				}
			}

			$chapter_id = $this->db->insert_id();
			return $chapter_id;
		}
		
		function chapter_add9($option=null)
		{
			if ($option['book_id']) {

				for( $i=0 ; $i < 9 ; $i++ ) {
					$this->db->set('book_id', $option['book_id']);
					$this->db->set('num', $i+1 );
					$this->db->insert('bk_chapter');
				}
			}

			$chapter_id = $this->db->insert_id();
			return $chapter_id;
		}
	
		function chapter_gets($book_id)
		{
			$this->db->select('*');
			$this->db->order_by('seq', 'ASC');
			$this->db->order_by('num', 'ASC');

			if ($book_id) {
				$this->db->where('book_id', $book_id);
			}
			$result = $this->db->get('bk_chapter')->result();;
			return $result;
		}

		// 수정 
	function chapter_modify($option=null)
	{
		$this->db->set('book_id', $option['book_id']);
		$this->db->set('num', $option['num']);
		$this->db->set('name', $option['name']);
	
		$this->db->where('id', $option['id']);

		$result = $this->db->update('bk_chapter');

		return $result;
	}

	// 삭제
	function chapter_delete($chapter_id)
	{
		$result = $this->db->delete('bk_chapter', array(
			'id' => $chapter_id
		));
		return $result;
	}
}

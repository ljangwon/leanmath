<?php
class Fi_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	// 교재 마스터 CRUD start 
	function fi_add($option=null)
	{
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
		$fi_id = $this->db->insert_id();
		return $fi_id;
	}

	function fi_gets($option = null)
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

	function fi_get_count_option($option=null)
	{
		$this->db->select('count(*) as cnt');
		$result = $this->db->get_where('bk_master',array(
				'grade1' => $option['grade1'],
				'grade2' => $option['grade2'],

			)
		)->row();
		return $result;
	}

	function fi_get($fi_id)
	{
		$this->db->select('*');

		$result = $this->db->get_where('bk_master', array(
			'id' => $fi_id
		))->row();
		return $result;
	}

	// 수정 
	function fi_modify($option=null)
	{
		$this->db->set('grade1', $option['grade1']);
		$this->db->set('grade2', $option['grade2']);
		$this->db->set('name', $option['name']);
		$this->db->set('level', $option['level']);

		$this->db->set('cash_num', $option['cash_num']);
		$this->db->set('memo', ltrim($option['memo']));
		$this->db->set('flag', $option['flag']);

		$this->db->where('id', $option['id']);

		$result = $this->db->update('bk_master');

		return $result;
	}

	// 삭제
	function fi_delete($fi_id)
	{
		$result = $this->db->delete('bk_master', array(
			'id' => $fi_id
		));
		return $result;
	}
	// 교재 마스터 CRUD end

		// 단원 CRUD start 
		function cash_add($option=null)
		{
			if ($option['fi_id']) {
				$this->db->set('fi_id', $option['fi_id']);
			}
	
			$this->db->insert('bk_cash');
			$cash_id = $this->db->insert_id();
			return $cash_id;
		}

		function cash_add6($option=null)
		{
			if ($option['fi_id']) {

				for( $i=0 ; $i < 6 ; $i++ ) {
					$this->db->set('fi_id', $option['fi_id']);
					$this->db->set('num', $i+1 );
					$this->db->insert('bk_cash');
				}
			}

			$cash_id = $this->db->insert_id();
			return $cash_id;
		}
		
		function cash_add9($option=null)
		{
			if ($option['fi_id']) {

				for( $i=0 ; $i < 9 ; $i++ ) {
					$this->db->set('fi_id', $option['fi_id']);
					$this->db->set('num', $i+1 );
					$this->db->insert('bk_cash');
				}
			}

			$cash_id = $this->db->insert_id();
			return $cash_id;
		}
	
		function cash_gets($fi_id)
		{
			$this->db->select('*');
			$this->db->order_by('seq', 'ASC');
			$this->db->order_by('num', 'ASC');

			if ($fi_id) {
				$this->db->where('fi_id', $fi_id);
			}
			$result = $this->db->get('bk_cash')->result();;
			return $result;
		}

		// 수정 
	function cash_modify($option=null)
	{
		$this->db->set('fi_id', $option['fi_id']);
		$this->db->set('num', $option['num']);
		$this->db->set('name', $option['name']);
	
		$this->db->where('id', $option['id']);

		$result = $this->db->update('bk_cash');

		return $result;
	}

	// 삭제
	function cash_delete($cash_id)
	{
		$result = $this->db->delete('bk_cash', array(
			'id' => $cash_id
		));
		return $result;
	}
}

<?php
class Payment extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('Payment_m', 'payment_m');
		$this->load->model('Student_m', 'student_m');
	}
	function index()
	{
		$this->load->view('payment/payment_v');
	}

	function payment_data()
	{
		$data = $this->payment_m->payment_list($this->input->post('month'));
		echo json_encode($data);
	}

	function save()
	{
		$data = $this->payment_m->save_payment(
			array(
				'year'  => $this->input->post('year'),
				'month' => $this->input->post('month'),
				'st_id' => $this->input->post('st_id'),
				'name' =>  $this->input->post('st_name'),
				'pay_status'  => "미납"
			)
		);
		echo json_encode($data);
	}

	function add_payment_by_month()
	{
		$data = $this->payment_m->add_payment_by_month(
			array(
				'year' => $this->input->post('year'),
				'month' => $this->input->post('month')
			)
		);
		echo json_encode($data);
	}

	function update()
	{
		$data = $this->payment_m->update_payment();

		echo json_encode($data);
	}

	function delete()
	{
		$data = $this->payment_m->delete_payment();
		echo json_encode($data);
	}

	function month_delete()
	{
		$data = $this->payment_m->month_delete(
			array(
				'year' => $this->input->post('year_del'),
				'month' => $this->input->post('month_del')
			)
		);
		echo json_encode($data);
	}
}

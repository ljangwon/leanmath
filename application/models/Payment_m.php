<?php
class Payment_m extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function payment_list($option = null)
    {
        $this->db->select('p.id, p.month, p.st_id, p.name, s.class_name, p.pay_status');
        $this->db->from('st_payment as p');
        $this->db->join('student as s', 'p.st_id=s.id', 'left');
        $this->db->where('year', "2021년");
        if ($option) {
            $this->db->where('month', $option);
        }

        $result = $this->db->get()->result();
        return $result;
    }

    function save_payment($option)
    {

        $result = $this->db->insert('st_payment', $option);
        return $result;
    }

    // temporally
    function add_payment_by_month($option)
    {
        $this->db->select('*');
        $this->db->where('flag', 1);
        $this->db->order_by('flag', 'ASC');
        $this->db->order_by('class_name', 'ASC');
        $this->db->order_by('name', 'ASC');
        $this->db->order_by('grade1', 'DESC');
        $this->db->order_by('grade2', 'ASC');

        $result = $this->db->get('student')->result();

        $net_income = 0;

        foreach ($result as $entry) {
            $net_income += $entry->fees;
            $net_income -= $entry->discount;
            $data = array(
                'year'  => $option['year'],
                'month' => $option['month'],
                'st_id' => $entry->id,
                'name' =>  $entry->name,
                'regular_price' => $entry->fees,
                'discount' => $entry->discount,
                'discount_memo' => $entry->discount_memo,
                'pay_status'  => "미납"
            );
            $result = $this->db->insert('st_payment', $data);
        }
        return $result;
    }

    function month_delete($option)
    {
        $this->db->where($option);
        $result = $this->db->delete('st_payment');
        return $result;
    }

    function update_payment()
    {
        $payment_id = $this->input->post('payment_id');
        $pay_status = $this->input->post('pay_status');

        $this->db->set('pay_status', $pay_status);
        $this->db->where('id', $payment_id);
        $result = $this->db->update('st_payment');
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Payment updated: id=</div>');
        return $result;
    }

    function delete_payment()
    {
        $payment_id = $this->input->post('payment_id');
        $this->db->where('id', $payment_id);
        $result = $this->db->delete('st_payment');
        return $result;
    }

    // insert
    function insert($option = null)
    {
        if ($option['year']) {
            $this->db->set('year', $option['year']);
        }

        if ($option['month']) {
            $this->db->set('month', $option['month']);
        }

        if ($option['st_id']) {
            $this->db->set('st_id', $option['st_id']);
        }

        if ($option['fees']) {
            $this->db->set('regular_price', $option['fees']);
        }

        $this->db->set('pay_status', '미납');

        $this->db->insert('st_payment');
        return true;
    }

    // select
    function select_by_month($option)
    {
        $this->db->select('*');
        $this->db->from('st_payment');
        $this->db->join('student', 'student.id=st_payment.st_id');
        $this->db->where('year', "2021");
        $this->db->where('month', $option['month']);
        $result = $this->db->get()->result();

        return $result;
    }

    function select_st_payment_by_option($option)
    {
        $this->db->select('*');
        $this->db->from('st_payment as p');
        $this->db->join('student as s', 's.id=p.st_id');
        $this->db->where('year', "2021");

        if ($option['month']) {
            $this->db->where('month', $option['month']);
        }

        $result = $this->db->get()->result();

        return $result;
    }
}

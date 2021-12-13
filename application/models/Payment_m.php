<?php
class Payment_m extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function payment_list($option = null)
    {
        $this->db->select('p.id, p.year, p.month, p.st_id, p.name, s.class_name, 
        p.regular_price, p.discount1, p.discount2, 
        p.discount_memo, p.return_price, p.net_income, 
        p.receipt_status, p.receipt_use, p.receipt_phone,
        p.pay_type, p.pay_status');
        $this->db->from('st_payment as p');
        $this->db->join('student as s', 'p.st_id=s.id', 'left');

        if ($option) {
            $this->db->where($option);
        } else {
            $this->db->where('year', "2021년");
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
        $year = $option['year'];
        $month = $option['month'];

        $this->db->select('id, name, fees, discount1, discount2, discount_memo, receipt_phone, receipt_use');
        $this->db->where('flag', 1);
        $this->db->order_by('flag', 'ASC');
        $this->db->order_by('class_name', 'ASC');
        $this->db->order_by('name', 'ASC');
        $this->db->order_by('grade1', 'DESC');
        $this->db->order_by('grade2', 'ASC');

        $result = $this->db->get('student')->result();

        $net_income = 0;

        foreach ($result as $entry) {
            $net_income = 0;
            $net_income += $entry->fees;
            $net_income -= $entry->discount1;

            if ($entry->receipt_use == "사용") {
                $receipt_phone = $entry->receipt_phone;
            } else {
                $receipt_phone = '';
            }

            $data = array(
                'year'  => $year,
                'month' => $month,
                'st_id' => $entry->id,
                'name' =>  $entry->name,

                'regular_price' => $entry->fees,
                'discount1' => $entry->discount1,
                'discount2' => $entry->discount2,
                'discount_memo' => $entry->discount_memo,

                'receipt_phone' => $receipt_phone,
                'receipt_use' => $entry->receipt_use,

                'net_income' => $net_income,
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

    function update_pay_status($option)
    {
        $payment_id = $option['payment_id'];
        $pay_status = $option['pay_status'];

        $this->db->select('regular_price, discount1, discount2, return_price, receipt_status, receipt_use');
        $this->db->where('id', $payment_id);
        $this->db->from('st_payment');
        $entry = $this->db->get()->row();

        $regular_price = 0;
        $discount1 = 0;
        $discount2 = 0;
        $return_price = 0;
        $net_income = 0;
        $receipt_status = '';

        $regular_price = $entry->regular_price;
        $discount1 = $entry->discount1;
        $discount2 = $entry->discount2;
        $return_price = $entry->return_price;
        $receipt_status = $entry->receipt_status;
        $receipt_use = $entry->receipt_use;

        $net_income += $regular_price;
        $net_income -= $discount1;

        if ($pay_status == "현금수납") {
            $net_income -= $discount2;

            if ($receipt_use == "사용") {
                $receipt_status = '발행필요';
            }
        } else {
            $receipt_status = '';
        }

        $net_income -= $return_price;

        $this->db->set('pay_status', $pay_status);
        $this->db->set('net_income', $net_income);
        $this->db->set('receipt_status', $receipt_status);
        $this->db->where('id', $payment_id);

        $result = $this->db->update('st_payment');
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Pay Status updated</div>');
        return $result;
    }

    function update_discount($option)
    {
        $payment_id = $option['payment_id'];
        $pay_status = $option['pay_status'];

        $regular_price = 0;
        $discount1 = 0;
        $discount2 = 0;
        $return_price = 0;
        $net_income = 0;

        $regular_price += $option['regular_price'];
        $discount1 += $option['discount1'];
        $discount2 += $option['discount2'];
        $return_price += $option['return_price'];

        $discount_memo = $option['discount_memo'];
        $receipt_use = $option['receipt_use'];
        $receipt_phone = $option['receipt_phone'];

        // net_income calculation
        $net_income += $regular_price;
        $net_income -= $discount1;

        if ($pay_status == "현금수납") {
            $net_income -= $discount2;
        }

        $net_income -= $return_price;

        $data = array(
            'pay_status' => $pay_status,
            'regular_price' => $regular_price,
            'discount1' => $discount1,
            'discount2' => $discount2,
            'return_price' => $return_price,
            'discount_memo' => $discount_memo,
            'receipt_use' => $receipt_use,
            'receipt_phone' => $receipt_phone,
            'net_income' => $net_income
        );

        $this->db->set($data);
        $this->db->where('id', $payment_id);

        $result = $this->db->update('st_payment');
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Discount updated</div>');
        return $result;
    }

    function update_receipt_status($option)
    {
        $payment_id = $option['payment_id'];

        $this->db->select('receipt_status, pay_status, receipt_use');
        $this->db->where('id', $payment_id);
        $this->db->from('st_payment');
        $entry = $this->db->get()->row();

        $receipt_status = $entry->receipt_status;
        $pay_status = $entry->pay_status;
        $receipt_use = $entry->receipt_use;

        if ($pay_status == '현금수납' && $receipt_use == '사용') {
            if ($receipt_status == '발행필요') {
                $receipt_status = '발행완료';
            } elseif ($receipt_status == '발행완료') {
                $receipt_status = '발행필요';
            }
        }

        $this->db->set('receipt_status', $receipt_status);
        $this->db->where('id', $payment_id);

        $result = $this->db->update('st_payment');
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Pay Status updated</div>');
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

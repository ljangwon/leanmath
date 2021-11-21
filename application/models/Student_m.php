<?php
class Student_m extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function gets($option = null)
    {
        $this->db->select('*');
        $this->db->order_by('flag', 'ASC');
        $this->db->order_by('class_name', 'ASC');
        $this->db->order_by('grade1', 'DESC');
        $this->db->order_by('grade2', 'ASC');
        if ($option) {
            $this->db->where('grade1', $option);
            $this->db->where('flag', 1);
        }
        $result = $this->db->get('student')->result();
        //$result =  $this->db->query("SELECT * FROM student")->result();
        return $result;
    }

    function gets_today($option = null)
    {
        $this->db->select('*');
        $this->db->order_by('flag', 'ASC');
        $this->db->order_by('class_name', 'ASC');
        $this->db->order_by('grade1', 'DESC');
        $this->db->order_by('grade2', 'ASC');
        if ($option) {
            $this->db->where('class_day1', $option);
            $this->db->or_where('class_day2', $option);
            $this->db->or_where('class_day3', $option);
            $this->db->where('flag', 1);
        }
        $result = $this->db->get('student')->result();;
        //$result =  $this->db->query("SELECT * FROM student")->result();
        return $result;
    }

    function get_by_option($option)
    {
        $this->db->select('*');
        $this->db->order_by('name ASC');
        $this->db->where($option);

        $result = $this->db->get('student')->result();;

        return $result;
    }

    function get($student_id)
    {
        $this->db->select('*');

        $this->db->select('UNIX_TIMESTAMP(created) AS created');
        $result = $this->db->get_where('student', array(
            'id' => $student_id
        ))->row();
        return $result;
    }

    function get_count($option)
    {
        $this->db->select('count(*) as cnt');
        $result = $this->db->get_where('student', array('grade1' => $option))->row();
        return $result;
    }

    function get_count_option($option)
    {
        $this->db->select('count(*) as cnt');
        $result = $this->db->get_where(
            'student',
            array(
                'grade1' => $option['grade1'],
                'grade2' => $option['grade2'],
                'flag' => '1'
            )
        )->row();
        return $result;
    }

    function get_fees_sum($option)
    {
        $this->db->select_sum('fees');
        $this->db->where(array(
            'grade1' => $option,
            'flag' => '1'
        ));
        //$result = $this->db->get_where('student', array('grade1'=>$option))->row();
        $result = $this->db->get('student')->row();
        return $result;
    }

    function add($option)
    {
        $this->db->set('created', 'NOW()', false);
        $this->db->set('name', $option['name']);
        $this->db->set('class_name', $option['class_name']);


        $this->db->insert('student');
        $result = $this->db->insert_id();
        return $result;
    }

    function test_h_add($option)
    {
        $this->db->set('created', 'NOW()', false);
        $this->db->set('st_id', $option['st_id']);

        $this->db->insert('test_history');
        $result = $this->db->insert_id();
        return $result;
    }

    function delete($student_id)
    {
        $result = $this->db->delete('student', array(
            'id' => $student_id
        ));
        return $result;
    }

    function modify($option)
    {
        $this->db->set('created', 'NOW()', false);
        $this->db->set('name', $option['name']);
        $this->db->set('grade1', $option['grade1']);
        $this->db->set('school_name', $option['school_name']);
        $this->db->set('grade2', $option['grade2']);
        $this->db->set('class_name', $option['class_name']);
        $this->db->set('class_day1', $option['class_day1']);
        $this->db->set('class_time1', $option['class_time1']);
        $this->db->set('class_day2', $option['class_day2']);
        $this->db->set('class_time2', $option['class_time2']);
        $this->db->set('class_day3', $option['class_day3']);
        $this->db->set('class_time3', $option['class_time3']);

        $this->db->set('memo', ltrim($option['memo']));
        $this->db->set('fees', $option['fees']);
        $this->db->set('flag', $option['flag']);

        $this->db->where('id', $option['id']);

        $result = $this->db->update('student');

        if (true) {
            $this->load->view('error/main_error_v', array(
                'error' => 'update error ' . 'result: ' . $result
            ));
        }

        return $result;
    }

    function backup($student_id)
    {
        return $student_id . '백업 되었습니다.';
        //return $this->db->update('student', )
    }
}

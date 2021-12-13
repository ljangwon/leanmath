<?php
class Grid5_m extends CI_Model {

    function __construct()
    {    	
        parent::__construct();
    }

    function schedule_gets($option=null) {
        $this->db->select('*');
        $this->db->order_by('s_date', 'DESC');
        if( $option ) {
             $this->db->where('st_id', $option);        
        }        
        $result = $this->db->get()->result();
     	return $result;
    }

    function schedule_get($id){
        $this->db->select('*');
        $result = $this->db->get_where('st_schedule', 
                            array('id'=>$id)
                            )->row();
    	return $result;
    }

    function schedule_add($option)
    {
        $this->db->set('s_date', 'NOW()', false);
        $this->db->set('st_id', $option['st_id']);

        $this->db->insert('st_schedule');
        $result = $this->db->insert_id();
        return $result;
    }

    function schedule_delete($id)
    {
        $result = $this->db->delete('st_schedule', array(
            'id'=>$id
        ));
        return $result;
    }

    function schedule_modify($option)
    {
        $this->db->set('st_id', $option['st_id']);
        $this->db->set('mon_s', $option['mon_s']);
        $this->db->set('tue_s', $option['tue_s']);
        $this->db->set('wed_s', $option['wed_s']);
        $this->db->set('thr_s', $option['thr_s']);
        $this->db->set('fri_s', $option['fri_s']);
        $this->db->set('sat_s', $option['sat_s']);
        $this->db->set('sun_s', $option['sun_s']);
        $this->db->set('s_date', $option['s_date']);

        $this->db->where('id', $option['id']);

        $this->db->update('st_schedule');

        $id= $option['id'];

        return $id;
    }
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class A extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('a');
        $this->session->set_flashdata('message', '로그인에 실패 했습니다.');
    }
}

<?php
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function _require_login($return_url, $level)
    {
        // 로그인이 되어 있지 않다면 로그인 페이지로 리다이렉션
        if (!$this->session->userdata('is_login')) {
            alert('로그인이 필요합니다.', site_url('/auth/login?returnURL=' . rawurlencode($return_url)));
        }

        if ($this->session->userdata('level') < $level) {
            alert('권한이 부족합니다.', site_url('/auth/login?returnURL=' . rawurlencode($return_url)));
        }
    }
}

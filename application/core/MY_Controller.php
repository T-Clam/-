<?php
/**
 * Created by PhpStorm.
 * User: tg
 * Date: 16-11-18
 * Time: 下午6:52
 */
Class MY_Controller extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('template');
    }
}
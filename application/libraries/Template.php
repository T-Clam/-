<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }


    public function admin_render($content, $data = NULL)
    {
        if ( ! $content)
        {
            return NULL;
        }
        else
        {
            $this->template['header']          =        $this->CI->load->view('admin/_templates/header.php', $data, TRUE);
            $this->template['content']         =        $this->CI->load->view($content, $data, TRUE);
            $this->template['foot']            =        $this->CI->load->view('admin/_templates/foot.php', $data, TRUE);

            return $this->CI->load->view('admin/_templates/template', $this->template);
        }
    }


    public function auth_render($content, $data = NULL)
    {
        if ( ! $content)
        {
            return NULL;
        }
        else
        {
            $this->template['header']  = $this->CI->load->view('admin/_templates/header', $data, TRUE);
            $this->template['content'] = $this->CI->load->view($content, $data, TRUE);
            $this->template['foot']  = $this->CI->load->view('admin/_templates/foot', $data, TRUE);

            return $this->CI->load->view('admin/_templates/template', $this->template);
        }
    }

}
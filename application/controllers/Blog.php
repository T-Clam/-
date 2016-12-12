<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require("Pageset.php");

class Blog extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    //主页
    public function index()
    {
        $this->data['data'] = $this->db->query('SELECT * FROM wz where bid=1 ORDER BY TIME DESC ')->result_array();
        $this->data['wz_count'] = $this->db->query("select COUNT(*) a from wz ")->row()->a;
        $this->data['type'] = $this->db->query('SELECT * FROM wz_type ORDER BY id')->result();
        $this->template->auth_render('index', $this->data);
    }


    //文章
    public function article()
    {
        $wz = $this->db->query("select * from wz")->result();
        $p = new Page('5', '4', 'wz');

        $data = $p->sel("order by id desc ");

        $fz = $p->myPage();

        $log = array();

        $log['page'] = $fz;


        while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
            $log['log'][] = $row;

        }
        $this->template->auth_render('article', $log);

    }


    //文章查看
    public function articlelook()
    {
        $id = $this->input->GET('id');

        $this->db->query("update  wz set num = num+1 where id=?",$id);
        $data = $this->db->query('SELECT * FROM wz where id=' . $id)->row();

        $this->template->auth_render('articlelook', $data);
    }


    //生活
    public function life()
    {

        $this->template->auth_render('life');

    }


    //留言
    public function message()
    {
        //处理表单数据
        if ((!empty($this->input->POST('name'))) && (!empty($this->input->POST('message'))) && ($this->input->POST('name') != " ") && ($this->input->POST('message') != null)) {
            $con = new mysqli('localhost', 'root', '844385', 'ci_blog');
            $name = addslashes($this->input->POST('name'));
            $name = trim($name);
            $message = addslashes($this->input->POST('message'));
            $message = trim($message);
            $con->query("SET NAMES UTF8");
            $name = mysqli_real_escape_string($con, $name);
            $message = mysqli_real_escape_string($con, $message);
            $sql = "INSERT INTO message VALUES(0,'$name','$message',NOW())";
            $con->query($sql);
        }

        //使用分页类

        $p = new Page('10', '6', 'message');
        $data = $p->sel("order by id desc ");
        $fz = $p->myPage();
        $log = array();
        $log['page'] = $fz;
        while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
            $log['log'][] = $row;
        }
        $this->template->auth_render('message', $log);
    }


    //搜索
    public function search()
    {
        if (isset($_POST['search'])) {
            $data = array();
            $q = trim($this->input->post('q'));
            if (preg_match("/[ '.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/", $q)) {
                $data['key'] = '<b style="color: #6a7358">不允许有特殊字符</b>';
            } elseif (empty($q)) {
                $data['key'] = '<b style="color: #6a7358">关键字为空或无效</b>';
            } else {
                $all = @$this->db->query('SELECT * FROM wz where id like "%' . $q . '%" OR title like "%' . $q . '%" OR content like "%' . $q . '%" ');
                while ($row = $all->unbuffered_row('array')) {
                    $data['log'][] = $row;
                }
            }

            if (count($data) == 0)
                $data['key'] = '<b style="color: #6a7358">抱歉,没有找到所需的信息</b>';
            else
                $data['q'] = $q;
            $data['bid_key'] = 1;
            $this->template->auth_render('article', $data);
        }

    }

    public function search_type($type = 0)
    {
        $this->data['bid_key'] = 1;
        $this->data['log'] = $this->db->query("select * from wz where type = ?",$type)->result_array();
        $this->data['key'] = '<b style="color: #6a7358">抱歉,没有找到所需的信息</b>';
        $this->template->auth_render('article', $this->data);
    }

    public function home()
    {
        $this->db->query("set names utf8");
        $this->data['stu_info'] = $this->db->query("select * from student")->result();
        $this->load->view("home/api", $this->data);
    }

    public function image($id = 0)
    {
        if($id<10)
            $id = '0'.$id;
        $this->data['id'] = $id;
        $this->load->view('api',$this->data);
    }
    
    public function chatroom()
    {
	//exec("ps -ef|grep test.php",$info);
	//var_dump($info);die;
        $fp = fsockopen("mad-tg.cn", 80, $errno, $errstr, 30);
        if (!$fp){
            echo 'error fsockopen';
        }
        else{
            stream_set_blocking($fp,0);
            $http = "GET /blog/service_begin HTTP/1.1\r\n";
            $http .= "Host: mad-tg.cn\r\n";
            $http .= "Connection: Close\r\n\r\n";
            fwrite($fp,$http);
            fclose($fp);
        }

        $this->template->auth_render('chatroom');
    }


    public function service_begin(){
	exec("ps -ef|grep test.php",$info);
	if(count($info)<=2)		
        system('php /var/www/html/home/test.php');
    }
    public function Pinfo(){
	echo phpinfo();
}
}

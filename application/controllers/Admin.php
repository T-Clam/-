<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require("Pageset.php");

Class Admin extends My_Controller {
    public function __construct(){
        parent::__construct();
    }

    //控制台
    public function index()
    {
        $data['cvisitor'] = $this->db->get('visitor')->num_rows();
        $data['cwz'] = $this->db->get('wz')->num_rows();
        $data['cmessage'] = $this->db->get('message')->num_rows();
	$data['ctype']    = $this->db->get('wz_type')->num_rows();
        @$name = $_COOKIE['twpe'];
        if($name == 844385)
            $this->load->view('admin/controller',$data);
        else{
            $data['log'] = '审核未通过';
            $this->load->view('admin/login',$data);
        }

    }

    //访客
    public function visit(){
        
        $p = new Page('20','5','visitor');
        $fz = $p->myPage();

        $log=array();

        $log['page']=$fz;

        $con=mysqli_connect('localhost','root','844385','ci_blog');
        mysqli_query($con,'set names utf8' );
        $data =  mysqli_query($con,'select * from visitor order by time desc' );
        while ($row = mysqli_fetch_array($data,MYSQLI_ASSOC))
        {
            $log['log'][] = $row;

        }

        $this->load->view('admin/visit',$log);
    }




    //文章管理
    public function article(){
        $p = new Page('5','3','wz');

        $data = $p->sel("order by time desc ");

        $fz = $p->myPage();

        $log=array();

        $log['page']=$fz;


        while ($row = mysqli_fetch_array($data,MYSQLI_ASSOC))
        {
            $log['log'][] = $row;

        }

        $this->load->view('admin/articles_admin',$log);
    }
    



    //留言管理
    public function message(){
        $p = new Page('15','3','message');

        $data = $p->sel("order by time desc ");

        $fz = $p->myPage();

        $log=array();

        $log['page']=$fz;


        while ($row = mysqli_fetch_array($data,MYSQLI_ASSOC))
        {
            $log['log'][] = $row;

        }

        $this->load->view('admin/message_admin',$log);
        
        
    }
    


    //处理
    public function handle(){
        $id = $this->input->get('id');
        $type = $this->input->get('type');
        //判断一下参数
        if($type==1){
            $table = 'visitor';
            $control = 'visit';
        }
        elseif($type==2){
            $table = 'wz';
            $control = 'article';
        }
        elseif($type==3){
            $table = 'message';
            $control = 'message';
        }
        else{
            $talbe = 'wz';
        }
        //执行删除操作
        if($type!=4&&$type!=5){
            $this->db->where('id',$id)->delete("$table");
            $c_type = $this->db->query("select type from wz where id=?",$id)->row();
            if($type==2&&$c_type!=null)
                $this->db->query("update table wz_type set count=count-1 where type = ?",$c_type);
            redirect("/admin/$control");
        }

        //转到文章编辑
        else {
            if($type==4)
                redirect("/admin/edit?id=$id");
            else
                redirect("/admin/edit");
        }

    }


    //文章编辑
    public function edit(){
        $id = $this->input->get('id');
        //判断是否为删除操作
        if(!empty($id)){
            $this->data['id'] = $this->db->where('id',$id)->get('wz')->row()->id;
            $this->data['content'] = $this->db->where('id',$id)->get('wz')->row()->content;
            $this->data['title'] =$this->db->where('id',$id)->get('wz')->row()->title;
            $this->data['bid'] =$this->db->where('id',$id)->get('wz')->row()->bid;
            $this->data['c_type'] =$this->db->where('id',$id)->get('wz')->row()->type;
            $this->data['type'] = $this->db->get('wz_type')->result();
            $this->load->view('admin/edit_article',$this->data);
        }
        //编辑文章
        else{
            if(!empty($_POST['bt'])){
                $id2 = $this->input->post('wid');
                if($id2==''){
                    //发布文章
                    $bid = (!empty($this->input->post('bid')))?$this->input->post('bid'):0;
                    $title = $this->input->post('title');
                    $content = $this->input->post('content');
                    $this->db->query("INSERT INTO wz VALUES(0,?,?,?,NOW(),1,?,NOW())",[$bid,$title,$content,$this->input->post('type')]);
                    $this->db->query("update  wz_type set count=count+1 where id = ?",$this->input->post('type'));
                }
                else{
                    //修改文章
                    $bid = (!empty($this->input->post('bid')))?$this->input->post('bid'):0;
                    $title = $this->input->post('title');
                    $content = $this->input->post('content');
                    $this->db->query("UPDATE  wz SET id=?,bid=?,title=?,content=?,type = ?,m_time=NOW() where id=? ",[$id2,$bid,$title,$content,$this->input->post('type'),$id2]);
                    $this->db->query("update wz_type set count = count+1 where id = ?",$this->input->post('type'));

                    $this->db->query("update wz_type set count = count-1 where id = ?",$this->input->post('c_type'));
                    }
                redirect("/admin/article");
                }
            else{
                $this->data['type'] = $this->db->get('wz_type')->result();
                //防止视图出现错误提醒
                $this->data['title'] = '';
                $this->data['content'] = '';
                $this->data['id'] = '';
                $this->data['bid'] ='';
                $this->data['c_type'] ='';
                $this->load->view('admin/edit_article',$this->data);
            }

        }
    }

    //登录
    public function login(){
        if(empty($_POST['name'])){
            $this->load->view('admin/login');
        }
        else{
            if($this->input->post('name')=="twpe" && $this->input->post('password')=="844385"){
                setcookie("twpe",844385,time()+3600*24*3,'/');
                redirect("/admin/index");
            }
            else{
                $data['log'] = '审核未通过';
                $this->load->view('admin/login',$data);
            }
        }
    }
    //注销
    public function logout(){
        setcookie("twpe",'',  time()-120,'/');
        redirect("/blog/index");
    }

    public function layout($type = 0, $id=0){

        $this->data['type'] = $this->db->query("select * from wz_type")->result();
        if($type == 0) {
            $this->load->view('admin/layout',$this->data);
        }
        elseif($type == 1)
        {
            $this->db->query("insert into wz_type(type) VALUES(?)",$this->input->post('name'));
            redirect('/admin/layout');
        }
        elseif($type ==2 && $id!=0)
        {
            $this->db->query("delete from wz_type where id = ?",$id);
            redirect('/admin/layout');
        }

    }

}


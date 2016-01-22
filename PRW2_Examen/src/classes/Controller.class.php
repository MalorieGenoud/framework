<?php
namespace src\classes;

class Controller
{
    public $get;
    public $post;
    public $tableName;

    public function __construct($get, $post){
        $this->tableName = 'articles';//Name of the table
        $this->get = $get;
        $this->post = $post;
        $this->data();
    }

    public function action(){

    }

    public function send($result, $titles){
        $send = new Page($result, $titles, $this->get);
    }

    public function data(){
        $titles = App::db()->getFieldsNames($this->tableName);//Title of the table $tableName
        $data = new DataGrid($this->tableName, $titles, $this->get, $this->post);
        $result = $data->data();
        $this->send($result, $titles);
        //var_dump($result);
    }
}
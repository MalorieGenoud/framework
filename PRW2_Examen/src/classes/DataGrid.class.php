<?php
namespace src\classes;

use src\classes\Core\Db\QueryBuilder;

class DataGrid
{
    public $tableName;
    public $titles;
    public $get;
    public $post;

    public function __construct($tableName, $titles, $get, $post){

        $this->tableName = $tableName;
        $this->titles = $titles;
        $this->get = $get;
        $this->post = $post;
        //var_dump($GLOBALS);
    }

    public function data(){

        $data = new QueryBuilder();

        $where = '';

        if(!isset($this->get['action']) == 'search'){
            $query = $data->select()->from($this->tableName);//SELECT * FROM $tableName
        }
        else{
            //On vérifie dans la variable $_GET que ce qu'elle contient correspond aux valeurs de $title
            foreach($this->get as $key => $value) {
                //On vérifie si la valeur de $key appartient au tableau de $titles
                if (in_array($key, $this->titles) && $value != '') {
                    //echo $key ."=".$value."<br>";//Affiche les valeurs de $key
                    $where.=$key." LIKE '%".$value."%',";//On concatene
                }
            }
            $where = rtrim($where,",");
            //echo $where;
            $query = $data->select()->from($this->tableName)->where($where);//SELECT * FROM $tableName
        }

        if(isset($this->get['order']) && $this->get['order'] != ''){
            $query->order($this->get['order']);//Order by DESC
        }
        $sql = $query->getSql();//Execute all the functions

        return $articles = App::db()->fetch($sql);//SELECT * FROM $tableName
    }
}






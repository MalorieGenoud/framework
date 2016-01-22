<?php
namespace src\classes;

class Page
{

    public $get;
    public $titles;
    public $result;

    public function __construct($result, $titles, $get){
        $this->result = $result;
        $this->titles = $titles;
        $this->get = $get;
        $this->pages();
    }

    public function pages(){
        //var_dump($this->result);
        $meta = include("src/config/pages.php");

        //On affiche par défaut la page "display"
        if(!isset($this->get["page"]) || $this->get["page"] == ''){
            $this->get['page'] = 'display';
        }

        //S'il ne trouve pas le fichier il affiche la page "error"
        if(!(file_exists("src/views/".$this->get['page'].".php"))){
            $this->get['page'] = 'error';
            $code = '404';
            header($_SERVER["SERVER_PROTOCOL"]." ".$code);
        }

        $title = isset($meta[$this->get['page']]["title"]) ? $meta[$this->get['page']]["title"] : '';
        $keywords = isset($meta[$this->get['page']]["keywords"]) ? $meta[$this->get['page']]["keywords"] : '';
        $description = isset($meta[$this->get['page']]["description"]) ? $meta[$this->get['page']]["description"] : '';

        $flashMessage = '';
        ob_start();
        try{
            include("src/views/".$this->get['page'].".php");
        }
        catch(Exception $e){
            $flashMessage = $e->getMessage();
        }
        $content = ob_get_contents();
        ob_end_clean();

        require("src/templates/template.php");
    }
}

?>
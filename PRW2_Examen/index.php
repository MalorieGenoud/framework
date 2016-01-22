<?php
session_start();

$config = include('src/config/config.php');

require_once('/src/classes/App.class.php');

//Connection DB
src\classes\App::init($config['db']);





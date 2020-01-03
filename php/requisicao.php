<?php

require_once "Conexao.php";
require_once 'index.php';

try{   
    $Conexao    = Conexao::getConnection();
    
}catch(Exception $e){
    echo $e->getMessage();
    exit;
}
<?php

define("PASTA_LMG", "documento/");
session_start();
require_once 'Connection.php';


$_SESSION['data'] = date('y/m/d');

//Tratamento das imagens
$temp= $_FILES['imagem']['tmp_name'];
$img = $_FILES['imagem']['name'];

$tit= isset($_POST['titulo'])?$_POST['titulo']:"";

move_uploaded_file($temp, PASTA_LMG.$img);

//Banco de dados

if($_POST['titulo']){

$sql = "INSERT INTO title (img,titulo) VALUES (:img,:titulo)";


$resp = Connection::Connectar()->prepare($sql);

$resp->bindValue(":img", $img);
$resp->bindValue(":titulo", $tit);

$resp->execute();

    $_SESSION['msg'] = "<div class='alert alert-success'>Upload success...</div>";


}else{

    $_SESSION['msg'] = "<div class='alert alert-danger'>Upload failed...</div>";

}

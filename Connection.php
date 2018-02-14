<?php
/**
 * Created by PhpStorm.
 * User: Alan
 * Date: 17/01/18
 * Time: 19:21
 */

class Connection {

    public static  $conn;

    public static function  Connectar(){

        if(!self::$conn){
            try{
                self::$conn = new PDO('mysql:host=localhost;port=3306;dbname=repositorio','root','');
            }catch (Exception $e){
                echo $e->getMessage();
            }
        }
        return self::$conn;
    }
}
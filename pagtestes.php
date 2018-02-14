<?php
/**
 * Created by PhpStorm.
 * User: Alan
 * Date: 23/01/2018
 * Time: 13:14
 */
session_id('qo2gstvk1q0d0hntjo0t1b4pj7'); //Recupera a sessão.

session_start();
session_regenerate_id(); // Cria uma nova sessão.

  echo  session_id()."<br><br>";

  var_dump($_SESSION); // Mostra o conteúdo de sessão.

switch ( session_status()){ //Retorn o staus da sessão.

    case  PHP_SESSION_DISABLED; //Desabilitada.
     echo 'Disable';
      break;

    case PHP_SESSION_ACTIVE;
     echo 'Active'.$_SESSION['msg']."Data :".$_SESSION['data']; // habilitada.
      break;

    case PHP_SESSION_NONE; // Null.
     echo  'Not find';
      break;
}

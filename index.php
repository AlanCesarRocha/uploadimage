<?php
/**
 * Created by PhpStorm.
 * User: Alan
 * Date: 17/01/18
 * Time: 00:26
 */
 setlocale(LC_ALL,'pt-BR','pt-BR.utf-8','portuguese');
 define('Versao',"Versão utilizada do PHP ".PHP_VERSION);
 define('Data',"Em : ".date("l,d/m/Y,H:i:s"));
 session_start();
?>

<html>
<head>
    <title>JQuery</title>
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href=" css/jquery.dataTables.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/jquery.dataTables.js"></script>

</head>
<body>
<p><?php echo Versao."<br>".Data;
 $st = strtotime('now + 2 day');
 echo '<br/>'.date('l,d/m/Y',$st);
 strftime('%A %M');
?></p>
<div id="carregando" class="center">
    <img src="http://goo.gl/prjII7" width="150" height="100" />
</div>

<div id="conteudo">

  <div class="container">

      <div class="row">
          <div class="col-sm-5 col-md-5 col-lg-5">
              <h1>Upload de imagens</h1>
<form method="post" action="Main.php">
    <div class="form-group">
        <input type="text" name="titulo" placeholder="Titulo" class="form-control">
    </div>
    <div class="form-group">
        <input type="file" name="imagem" class="form-control">
    </div>
    <div class="form-group">
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" style="width: 0%">
            </div>
            </div>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-info btn-sm upload">Upload</button>
    </div>
</form>
    <?php

    if(isset($_SESSION['msg'])){

       echo $_SESSION['msg'];
 
    }

    ?>
</div>
          <div class="col-sm-7 col-md-7 col-lg-7">


              <section>
                  <div class="table-responsive-sm">
                      <table id="tab" class="table table-hover table-responsive table-striped table-sm">
                          <thead class="table-info">
                          <tr>
                              <th>Id</th>
                              <th>Imagem</th>
                              <th>Titulo</th>

                          </tr>
                          </thead>
                          <tbody>
                          <?php
                          require_once 'Connection.php';

                          $sql = "SELECT * FROM title";
                          $resp = Connection::Connectar()->prepare($sql);

                          $resp->execute();

                          while($row = $resp->fetch(PDO::FETCH_ASSOC)):
                              echo "<tr>";
                              echo "<td>".$row['id']."</td>";
                              echo "<td><img src='documento/$row[img]'></td>";
                              echo "<td>".$row['titulo']."</td>";
                              echo "</tr>";


                          endwhile;?>
                      </table>
                  </div>
              </section>

          </div>
</div>
</div>
</div>
</body>
</html>

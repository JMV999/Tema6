<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>UT2_exemple3_sessions</title>
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1>UT2_Exemple3_sessions</h1>
        <p>L'utilització de sessions permet tenir "memòria" del que ha estat passant cada vegada que l'usuari demana la pàgina PHP</p>
        <p> tenim la varible $_SESSION que matindrà el valor cada vegada que un usuari entri des del mateix navegador (si el tanca i el torna a obrir serà una altra sessió)
      </div>
    </div>

    <?php

      session_start();

      //miram si SESSION esta inicialitzat
      if(!isset($_SESSION['valor'])){
        $_SESSION['valor']=0;
      }
      if(isset($_REQUEST['operacion'])){
        if ($_REQUEST['operacion']=="mas1"){
          $_SESSION['valor']=$_SESSION['valor']+1;
        }
        if ($_REQUEST['operacion']=="mas5"){
          $_SESSION['valor']=$_SESSION['valor']+5;
        }
        if ($_REQUEST['operacion']=="menos2"){
          $_SESSION['valor']=$_SESSION['valor']-2;
        }      
      echo '<div class="alert alert-primary" role="alert"> Has marcado '.$_REQUEST['operacion'].' y el valor actualizado es '.$_SESSION['valor'].'</div>';
      }
      echo '<form action="UT2_exemple3_sessions.php" method="get">
      <button name="operacion" type="submit" class="btn btn-primary" value="mas1">+1</button>
      <button name="operacion"  type="submit" class="btn btn-primary" value="mas5">+5</button>
      <button name="operacion"  type="submit" class="btn btn-primary" value="menos2">-2</button>

      </form>
      ';
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
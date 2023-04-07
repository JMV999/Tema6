<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>UT2_exemple2_taulaPHP</title>
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1>UT2_Exemple2_taulaPHP</h1>
        <p>Pintar una taula en HTML a partir d'una matriu en PHP.</p>
      </div>
    </div>

    <?php
      $titolsCol=['','2015','2016','2017','2018','2019','2020'];
      $titolsFilera=['Tomatigues','Melons','Ginjols'];
      $dades=[[1,2,3,4,5,6],[3,3,3,4,4,4],[9,9,8,8,7,7]];
      //primer la capçalera
      echo '<table class="table"><thead><tr>';
      for($a=0;$a<count($titolsCol);$a++){
        echo '<th scope="col">'.$titolsCol[$a].'</th>';
      }
      echo '</tr></thead>';
      //ara el Body, un bucle principal segons el nombre de fileres i un secundari que recorri cada filera
      echo '<tbody>';
      for($fila=0;$fila<count($titolsFilera);$fila++){
        echo '<tr><th scope="row">'.$titolsFilera[$fila].'</th>';
        for($col=0;$col<count($titolsCol)-1;$col++){
          echo '<td>'.$dades[$fila][$col].'</td>';
        }
        echo '</tr>';
      }
      echo '</tbody></table>';
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
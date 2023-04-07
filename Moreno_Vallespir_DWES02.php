<?php
session_start();

if (!isset($_SESSION["reserves"])) {
    $_SESSION["reserves"] = 0;
}

$error = false;
$errmessage = "<h3>S'han produit els següents errors</h3>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Les comprobacions següents es podrien fer posant requires en el camps del formulari del codi html pero interpret que el exercici demana fer-les per php
    if (empty($_POST["dia"])) {
        $errmessage .= "<p>No s'ha introduit cap dia</p>";
    }

    if (empty($_POST["hora"])) {
        $errmessage .= "<p>No s'ha introduit cap hora</p>";
    }

    if (!empty($_POST["dia"]) && !empty($_POST["hora"])) {
        for ($i = 0; $i < $_SESSION["reserves"]; $i++) {
            if ($_POST["dia"] == $_SESSION["reserva$i"]["dia"] && $_POST["hora"] == $_SESSION["reserva$i"]["hora"]) {
                $errmessage .= "<p>Ja hi ha una reserva a aquest dia i hora</p>";
            }
        }

    }

    if (empty($_POST["tipopista"])) {
        $errmessage .= "<p>No s'ha elegit un tipus de pista</p>";
    }

    if (empty($_POST["nom"])) {
        $errmessage .= "<p>No s'ha introduit cap nom</p>";
    }

    if (empty($_POST["telefon"])) {
        $errmessage .= "<p>No s'ha introduit cap telefon</p>";
    }

    if ($errmessage != "<h3>S'han produit els següents errors</h3>") {
        $error = true;
    }

    if ($error == false) {
        $numero = $_SESSION["reserves"];
        $_SESSION["reserva$numero"] = ["dia" => $_POST["dia"], "hora" => $_POST["hora"], "tipopista" => $_POST["tipopista"], "nom" => $_POST["nom"], "telefon" => $_POST["telefon"]];

        $_SESSION["reserves"]++;

        //var_dump($_SESSION);

        header("Location: Moreno_Vallespir_DWES02.php?web=pista");
        exit;
    }



}

$dies = ["Dilluns", "Dimarts", "Dimecres", "Dijous", "Divendres"];
$hores = [15, 16, 17, 18, 19, 20];
for ($i = 0; $i < count($dies); $i++) {

    for ($j = 0; $j < count($hores); $j++) {
        $nombrevariable = $dies[$i] . $hores[$j];
        $$nombrevariable = "";
    }
}

for ($i = 0; $i < $_SESSION["reserves"]; $i++) {
    $nombrevariable = $_SESSION["reserva$i"]["dia"] . $_SESSION["reserva$i"]["hora"];
    $$nombrevariable = $_SESSION["reserva$i"]["nom"];
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Tasca DWES2 - Gimnàs</title>
</head>

<body>
    <?php if (!isset($_GET["web"]) || $_GET["web"] == "reserva"): ?>
    <h1>Tasca DWES2 - Gimnàs</h1>
    <div class="alert alert-secondary" role="alert">
        <div class="row">
            <div class="col-sm-2">
                <form name="canviPantalla" method="GET" action="Moreno_Vallespir_DWES02.php">
                    <button type="submit" class="btn btn-primary" name="web" value="reserva">Reservar pista</button>
                </form>
            </div>
            <div class="col-sm-2">
                <form name="canviPantalla" method="GET" action="Moreno_Vallespir_DWES02.php">
                    <button type="submit" class="btn btn-light" name="web" value="pista">Veure Reserves </button>
                </form>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-4">
            <form name="reserva" method="POST" action="Moreno_Vallespir_DWES02.php">
                <h2> Reserva pista</h2>
                <p>
                    <label for="dia">Dia:</label>
                    <select class="form-select" id="dia" name="dia">
                        <option value=""></option>
                        <option value="Dilluns">Dilluns</option>
                        <option value="Dimarts">Dimarts</option>
                        <option value="Dimecres">Dimecres</option>
                        <option value="Dijous">Dijous</option>
                        <option value="Divendres">Divendres</option>
                    </select>
                    <label for="hora">Hora:</label>
                    <input type="number" step="1" max="20" min="15" name="hora" id="hora">
                </p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipopista" id="tipopista1" value="Exterior">
                    <label class="form-check-label" for="tipopista1">Exterior</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipopista" id="tipopista2" value="Coberta">
                    <label class="form-check-label" for="tipopista2">Coberta</label>
                </div>

                <h2> Usuari</h2>
                <p>
                    <label for="nom">Nom i llinatges</label>
                    <input type="text" name="nom" id="nom">
                </p>
                <p>
                    <label for="telefon">Telèfon</label>
                    <input type="number" name="telefon" id="telefon">
                </p>

                <?php
        if ($error) {
            echo '<div style="color:red">' . $errmessage . '</div>';
        }
                ?>


                <div style="text-align: center">
                    <input type="submit" value="Enviar" name="enviar"
                        style="margin-right: 5px; width: 60px; height:30px; font-weight: bold">
                    <input type="reset" value="Limpiar" style="width: 60px; height:30px; font-weight: bold">
                </div>
            </form>
        </div>
    </div>



    <?php elseif ($_GET["web"] == "pista"): ?>
    <h1>Tasca DWES2 - Gimnàs</h1>
    <div class="alert alert-secondary" role="alert">
        <div class="row">
            <div class="col-sm-2">
                <form name="canviPantalla" method="GET" action="Moreno_Vallespir_DWES02.php">
                    <button type="submit" class="btn btn-light" name="web" value="reserva">Reservar pista</button>
                </form>
            </div>
            <div class="col-sm-2">
                <form name="canviPantalla" method="GET" action="Moreno_Vallespir_DWES02.php">
                    <button type="submit" class="btn btn-primary" name="web" value="pista">Veure Reserves </button>
                </form>
            </div>
        </div>
    </div>
    <h2> Opció senzilla</h2>
    <div class="row">
        <div class="col-sm-4">

            <?php if ($_SESSION["reserves"] != 0): ?>
            <?php
            for ($i = 0; $i < $_SESSION["reserves"]; $i++) {
                echo '<table class="table table-bordered table-sm">
                        <tbody>
                            <tr>
                                <td>Dia</td>
                                <th scope="row">';
                echo $_SESSION["reserva$i"]["dia"];
                echo '</th>
                                <td>Hora</td>
                                <th scope="row">';
                echo $_SESSION["reserva$i"]["hora"];
                echo '</th>
                                <td>Tipus</td>
                                <th scope="row">';
                echo $_SESSION["reserva$i"]["tipopista"];
                echo '</th>
                            </tr>
                            <tr>
                                <td>Usuari</td>
                                <th scope="row" colspan="3">';
                echo $_SESSION["reserva$i"]["nom"];
                echo '</th>
                                <td>Telefon</td>
                                <th scope="row">';
                echo $_SESSION["reserva$i"]["telefon"];
                echo '</th>
                            </tr>
                        </tbody>
                    </table>';
            }

            ?>

            <?php else: ?>
            <h4>No hi ha cap reserva feta</h4>
            <?php endif; ?>

        </div>
    </div>
    <h2> Opció avançada</h2>
    <div class="row">
        <div class="col-sm-4">
            <table class="table table-bordered table-sm">
                <thead>
                    <th></th>
                    <th>Dilluns</th>
                    <th>Dimarts</th>
                    <th>Dimecres</th>
                    <th>Dijous</th>
                    <th>Divendres</th>
                </thead>
                <tbody>
                    <tr>
                        <th>15:00</th>
                        <td>
                            <?php echo $Dilluns15 ?>
                        </td>
                        <td>
                            <?php echo $Dimarts15 ?>
                        </td>
                        <td>
                            <?php echo $Dimecres15 ?>
                        </td>
                        <td>
                            <?php echo $Dijous15 ?>
                        </td>
                        <td>
                            <?php echo $Divendres15 ?>
                        </td>
                    </tr>
                    <tr>
                        <th>16:00</th>
                        <td>
                            <?php echo $Dilluns16 ?>
                        </td>
                        <td>
                            <?php echo $Dimarts16 ?>
                        </td>
                        <td>
                            <?php echo $Dimecres16 ?>
                        </td>
                        <td>
                            <?php echo $Dijous16 ?>
                        </td>
                        <td>
                            <?php echo $Divendres16 ?>
                        </td>
                    </tr>
                    <tr>
                        <th>17:00</th>
                        <td>
                            <?php echo $Dilluns17 ?>
                        </td>
                        <td>
                            <?php echo $Dimarts17 ?>
                        </td>
                        <td>
                            <?php echo $Dimecres17 ?>
                        </td>
                        <td>
                            <?php echo $Dijous17 ?>
                        </td>
                        <td>
                            <?php echo $Divendres17 ?>
                        </td>
                    </tr>
                    <tr>
                        <th>18:00</th>
                        <td>
                            <?php echo $Dilluns18 ?>
                        </td>
                        <td>
                            <?php echo $Dimarts18 ?>
                        </td>
                        <td>
                            <?php echo $Dimecres18 ?>
                        </td>
                        <td>
                            <?php echo $Dijous18 ?>
                        </td>
                        <td>
                            <?php echo $Divendres18 ?>
                        </td>
                    </tr>
                    <tr>
                        <th>19:00</th>
                        <td>
                            <?php echo $Dilluns19 ?>
                        </td>
                        <td>
                            <?php echo $Dimarts19 ?>
                        </td>
                        <td>
                            <?php echo $Dimecres19 ?>
                        </td>
                        <td>
                            <?php echo $Dijous19 ?>
                        </td>
                        <td>
                            <?php echo $Divendres19 ?>
                        </td>
                    </tr>
                    <tr>
                        <th>20:00</th>
                        <td>
                            <?php echo $Dilluns20 ?>
                        </td>
                        <td>
                            <?php echo $Dimarts20 ?>
                        </td>
                        <td>
                            <?php echo $Dimecres20 ?>
                        </td>
                        <td>
                            <?php echo $Dijous20 ?>
                        </td>
                        <td>
                            <?php echo $Divendres20 ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php endif; ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>

</html>
<?php
session_start();
if (!isset($_SESSION['connexion']) || $_SESSION['connexion'] !== true) { //Si l'utilisateur n'est pas connecté et 
    header("Location: login.php");                                      // arrive à acceder à la page alors on le dégage
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>



<body>
    <div class="text-white pt-5 pb-5 background police">
        <h1 class="text-center mt-3">Bonjour, <?= htmlspecialchars($_SESSION['name']) ?></h1>
        <div class="w-75 text-center mx-auto mt-5">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <button type="submit"
                            class="btn btn-<?= ($_SESSION['role'] == 'admin') ? 'outline-info':'light' ?> mt-5">Prendre
                            un
                            rendez-vous</button>
                    </div>
                    <div class="col">
                        <button type="submit"
                            class="btn btn-<?= ($_SESSION['role'] == 'admin') ? 'outline-info':'light' ?> mt-5">Consulter
                            mes
                            rendez-vous</button>
                    </div>
                    <?php if ($_SESSION['role'] == 'admin') { ?>
                    <div class="col">
                        <button type="submit"
                            class="btn btn-<?= ($_SESSION['role'] == 'admin') ? 'outline-info':'light' ?> mt-5">Gérer
                            les
                            utilisateurs</button>
                    </div>
                    <div class="col">
                        <button type="submit"
                            class="btn btn-<?= ($_SESSION['role'] == 'admin') ? 'outline-info':'light' ?> mt-5">Gérer
                            les
                            rendez-vous</button>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <a href="logout.php"><button type="submit" class="btn btn-outline-light mt-5">Retour au login</button></a>
        </div>
    </div>

    <div class="container text-center mt-5 police">
        <div class="row mb-5">
            <p class="h5 mb-5">Récapitulatif</p>
            <div class="col">
                <p><?= ($_SESSION['role'] == 'admin') ? 'Missions données:' :'' ?></p>
            </div>
            <div class="col">
                <p><?= ($_SESSION['role'] == 'admin') ? '56' :'' ?></p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <p>Missions reçues:</p>
            </div>
            <div class="col">
                <p><?= ($_SESSION['role'] == 'admin') ? '13' : '124' ?></p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <p>Missions accomplis:</p>
            </div>
            <div class="col">
                <p><?= ($_SESSION['role'] == 'admin') ? '9' : '101' ?></p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <p>Missions échouées:</p>
            </div>
            <div class="col">
                <p><?= ($_SESSION['role'] == 'admin') ? '4' : '23' ?></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>



</html>
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>



<body>
    <h1 class="text-center mt-3">Bonjour, <?= htmlspecialchars($_SESSION['name']) ?></h1>
    <div class="w-75 text-center mx-auto mt-5">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <button type="submit"
                        class="btn btn-<?= ($_SESSION['role'] == 'admin') ? 'danger':'success' ?> mt-5">Prendre un
                        rendez-vous</button>
                </div>
                <div class="col">
                    <button type="submit"
                        class="btn btn-<?= ($_SESSION['role'] == 'admin') ? 'danger':'success' ?> mt-5">Consulté mes
                        rendez-vous</button>
                </div>
                <?php if ($_SESSION['role'] == 'admin') { ?>
                <div class="col">
                    <button type="submit"
                        class="btn btn-<?= ($_SESSION['role'] == 'admin') ? 'danger':'success' ?> mt-5">Gérer les
                        utilisateurs</button>
                </div>
                <div class="col">
                    <button type="submit"
                        class="btn btn-<?= ($_SESSION['role'] == 'admin') ? 'danger':'success' ?> mt-5">Gérer les
                        rendez-vous</button>
                </div>
                <?php } ?>
            </div>
        </div>

        <a href="logout.php"><button type="submit" class="btn btn-primary mt-5">Retour au login</button></a>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>



</html>
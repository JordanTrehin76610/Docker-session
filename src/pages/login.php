<?php 
session_start();
require_once '../assets/db/users.php';


$erreur = [];
$emailValidator = 0;
$mdpValidator = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST["email"])) {
        if (empty($_POST["email"])) {
            $erreur["email"] = "Veuillez inscrire votre email";
        } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $erreur["email"] = "Mail non valide";
        } else {
            foreach ($users as $utilisateur) {
                if ($utilisateur['mail'] == $_POST['email']) {
                    $emailValidator = 1;
                    $mdp = $utilisateur["password"]; //On garde le mdp de l'utilisateur
                    $_SESSION['role'] = $utilisateur['role']; //Pour le $_SESSION
                    $_SESSION['name'] = $utilisateur['name'];
                    break;
                }
            }
            if ($emailValidator == 0) {
                 $erreur["email"] = "Adresse mail incorrecte";
            }
        }
    }

    if(isset($_POST["mdp"])) {
        if (empty($_POST["mdp"])) {
            $erreur["mdp"] = "Veuillez inscrire votre mot de passe";
        } else if(strlen($_POST["mdp"]) < 6){
            $erreur["mdp"] = "Mot de passe trop court";
        } else if (empty($erreur["email"])) {
            if (password_verify($_POST['mdp'], $mdp)) { //Verifie le mdp avec le mot de passe dans users.php
                $mdpValidator = 1;
            } else {
                $erreur["mdp"] = "Mot de passe incorrect";
            }
        }
    }

    if($emailValidator == 1 && $mdpValidator == 1) {
        header("Location: espace.php");
    }
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
</head>


<body>
    <h1 class="text-center mt-3">Connexion</h1>


    <div class="w-75 text-center mx-auto mt-5">

        <div class="container w-75">

            <form method="post" action="" novalidate>
                <span style="color: red !important; display: inline; float: none;">*</span>
                <span>Champ obligatoire à remplir</span>
                <div class="row mt-3">
                    <div class="col">
                        <div class="mb-3 text-start">
                            <label for="exampleFormControlInput1" class="form-label">Email</label><span
                                style="color: red !important; display: inline; float: none;">*</span><span
                                class="ms-2 text-danger fst-italic fw-light"><?= $erreur["email"] ?? '' ?></span>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Exemple: TheoduleLabit@email.com" value="<?= $_POST["email"] ?? "" ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 text-start">
                            <label for="exampleFormControlInput1" class="form-label">Mot de passe</label><span
                                style="color: red !important; display: inline; float: none;">*</span><span
                                class="ms-2 text-danger fst-italic fw-light"><?= $erreur["mdp"] ?? '' ?></span>
                            <input type="password" class="form-control" id="mdp" name="mdp"
                                placeholder="Exemple: MotDePasseSuperSecret0000">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Connexion</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>




</html>
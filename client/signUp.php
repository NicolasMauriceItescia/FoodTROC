<?php

//session_start();

include '../inc/accessBDD.php';

$username = "";
$email = "";
$nom = "";
$prenom = "";
$dateNaiss = "";
$ville = "";
$errors = [];


// SIGN UP USER
if (isset($_POST['signUpBtn'])) {


    if (empty($_POST['pseudo'])) {

        $errors['pseudo'] = 'Pseudo requis';
    }
    if (empty($_POST['email'])) {

        $errors['email'] = 'Email requis';
    }
    if (empty($_POST['motDePasse'])) {

        $errors['motDePasse'] = 'Mot de passe requis';
    }

    if (empty($_POST['dateNaiss'])) {

        $errors['dateNaiss'] = 'Date de naissance requise';
    }

    if (empty($_POST['ville'])) {

        $errors['ville'] = 'Ville requise';
    }

    if (isset($_POST['motDePasse']) && $_POST['motDePasse'] !== $_POST['motDePasseConf']) {

        $errors['motDePasseConf'] = 'Les deux mots de passe ne correspondent pas';
    }
    $username = $_POST['pseudo'];
    $email = $_POST['email'];
    $nom =  $_POST['nomClient'];
    $prenom =  $_POST['prenomClient'];
    $dateNaiss =  $_POST['dateNaiss'];
    $ville =  $_POST['ville'];
    $password = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT); //encrypt password

    

    $queryCheckUserName = "SELECT userName FROM Clients WHERE userName = '" . $username . "'";
    $resultatUserName = mysqli_query($dbh, $queryCheckUserName);

    if (mysqli_num_rows($resultatUserName) != 0) {
        $errors['pseudo'] = 'Ce nom d`utilisateur existe déjà, veuillez en choisir un autre';
    }
    
    if (count($errors) > 0) {
        include './form_signUp.php';

        foreach ($errors as $error) {

            echo '<p style="text-align: center">' . $error . '</p>';
        }
    }

        if (count($errors) === 0) {

            $query = "INSERT INTO Clients SET userName=?, email=?, nomClient=?, prenomClient=?, dateNaiss=?, ville=?, motDePasse=?";
            $stmt = $dbh->prepare($query);
            $stmt->bind_param('sssssss', $username, $email, $nom, $prenom, $dateNaiss, $ville, $password);
            $result = $stmt->execute();

            include './form_login.php';
        }

        $dbh = null;
    }


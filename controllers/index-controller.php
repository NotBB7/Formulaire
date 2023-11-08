<?php

// de base le formulaire est affiché car true
$showForm = true;

// Regex du Nom : seul les petites et grandes lettres ok
$regexName = '/^[a-zA-Z]+$/';

// Création d'une tableau d'erreurs
$errors = [];

// on recherche sur il y a une requete de type POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Vérification de l'input lastname
    if (isset($_POST['lastname'])) {
        $lastname = $_POST['lastname'];

        // verification si c vide
        if (empty($lastname)) {
            $errors['lastname'] = 'Nom obligatoire';
            // verification du format
        } else if (!preg_match($regexName, $lastname)) {
            $errors['lastname'] = 'Mauvais format';
        }
    }

    // Vérification de l'input firstname
    if (isset($_POST['firstname'])) {
        $firstname = $_POST['firstname'];

        // verification si c vide
        if (empty($firstname)) {
            $errors['firstname'] = 'Prénom obligatoire';
            // verification du format
        } else if (!preg_match($regexName, $firstname)) {
            $errors['firstname'] = 'Mauvais format';
        }
    }

    // Vérification de l'input email
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        // verification si c vide
        if (empty($email)) {
            $errors['email'] = 'Courriel obligatoire';
            // verification du format mail
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Mauvais format de mail';
        }
    }

    // Vérification du select
    // verification si utilisateur a selectionné une formule
    if (!isset($_POST['option'])) {
        $errors['option'] = 'Veuillez sélectionner un abonnement';
    }

    // Vérification du password 
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        // verification si c vide
        if (empty($password)) {
            $errors['password'] = 'Mot de passe obligatoire';
        }
    }

    // Vérification du confirmpassword 
    if (isset($_POST['confirmPassword'])) {
        $confirmPassword = $_POST['confirmPassword'];
        // verification si c vide
        if (empty($confirmPassword)) {
            $errors['confirmPassword'] = 'Validation obligatoire';
        }
    }

    // Nous lancons la verification mdp identique uniquement lorsqu'il n'y a pas d'erreurs sur les mdps dans $errors
    if(!array_key_exists('password', $errors) && !array_key_exists('confirmPassword', $errors)){
        if($password != $confirmPassword){
            $errors['confirmPassword'] = 'Mots de passe non identique';
        }
    }

    // verification si utilisateur a selectionné une formule
    if (!isset($_POST['cgu'])) {
        $errors['cgu'] = 'Veuillez accepter les CGU';
    }

    // à la fin des verifs on check le tableau $errors
    if (count($errors) == 0) {
        $showForm = false;
    }
}

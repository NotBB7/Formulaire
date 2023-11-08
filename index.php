<?php
// on appelle le controller
require_once 'controllers/index-controller.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contrôle de formulaire</title>
   <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
   <div class="row justify-content-center m-0">

      <!-- si showForm = true, on affiche le formulaire -->
      <?php if ($showForm) { ?>
         <div class="col-lg-4 bg-light shadow m-5 p-5 border">
            <p class="h2 mb-5 text-center">Chasse et Pêche</p>
            <form action="" method="POST" novalidate>
               <div class="mb-3">
                  <label for="lastname">Nom : </label>
                  <!-- ici message d'erreur -->
                  <span class="ms-2 text-danger fs-6"><?= $errors['lastname'] ?? '' ?></span>
                  <!-- rendre innofensive le résultat la valeur a l'aide de htmlspecialchars -->
                  <input class="ms-1 d-block" id="lastname" name="lastname" type="text" placeholder="ex. DOE" value="<?= htmlspecialchars($_POST['lastname'] ?? '') ?>" required>


               </div>

               <div class="mb-3">
                  <label for="firstname">Prénom : </label>
                  <span class="ms-2 text-danger fs-6"><?= $errors['firstname'] ?? '' ?></span>
                  <input class="ms-1 d-block" id="firstname" name="firstname" type="text" placeholder="ex. Jane" value="<?= htmlspecialchars($_POST['firstname'] ?? '') ?>" required>

               </div>

               <div class="mb-3">
                  <label for="email">Courriel : </label>
                  <span class="ms-2 text-danger fs-6"><?= $errors['email'] ?? '' ?></span>
                  <input class="ms-1 d-block" id="email" name="email" type="email" placeholder="ex. jane.doe@email.fr" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
               </div>

               <div class="mb-3">
                  <span class="ms-2 text-danger fs-6"><?= $errors['option'] ?? '' ?></span>
                  <select class="d-block" name="option" id="option">
                     <option value="" selected disabled>Choisissez un abonnement</option>
                     <!-- ternaire permettant de conserver le select  -->
                     <option value="Classique" <?= isset($_POST['option']) && $_POST['option'] == 'Classique' ? 'selected' : '' ?>>Classique</option>
                     <option value="Famille" <?= isset($_POST['option']) && $_POST['option'] == 'Famille' ? 'selected' : '' ?>>Famille</option>
                     <option value="Premium" <?= isset($_POST['option']) && $_POST['option'] == 'Premium' ? 'selected' : '' ?>>Premium</option>
                  </select>
               </div>

               <div class="mb-3">
                  <label for="password">Mot de passe : </label>
                  <span class="ms-2 text-danger fs-6"><?= $errors['password'] ?? '' ?></span>
                  <input class="ms-1 d-block" id="password" name="password" type="password" required>
               </div>

               <div class="mb-3">
                  <label for="confirmPassword">Validation Mdp : </label>
                  <span class="ms-2 text-danger fs-6"><?= $errors['confirmPassword'] ?? '' ?></span>
                  <input class="ms-1 d-block" id="confirmPassword" name="confirmPassword" type="password" required>
               </div>

               <div class="mb-1 text-center">
                  <input class="ms-1" id="cgu" name="cgu" type="checkbox" required>
                  <label for="cgu">J'ai lu et j'accepte les CGU</label>
               </div>
               <span class="ms-2 text-danger fs-6 d-block text-center"><?= $errors['cgu'] ?? '' ?></span>
               <button class="d-block mt-5 mx-auto btn btn-secondary">Valider</button>
            </form>
         </div>
         <!-- sinon on affiche le recap -->
      <?php } else { ?>
         <div class="col-lg-4 bg-light shadow m-5 p-5 border">
            <p class="text-center">RECAP'</p>
            <!-- rendre innofensive le résultat la valeur a l'aide de htmlspecialchars -->
            <p>Nom : <?= htmlspecialchars($_POST['lastname'] ?? '') ?></p>
            <p>Prénom : <?= htmlspecialchars($_POST['firstname'] ?? '') ?></p>
            <p>Courriel : <?= htmlspecialchars($_POST['email'] ?? '') ?></p>
            <p>Option : <?= htmlspecialchars($_POST['option'] ?? '') ?></p>
            <p>Mot de passe provisoire : <?= htmlspecialchars($_POST['confirmPassword'] ?? '') ?></p>
            <p>CGU : Acceptées</p>
            <a href="index.php" class="d-block mt-3 mx-auto btn btn-secondary">Retour</a>
         </div>
      <?php } ?>
   </div>

</body>

</html>
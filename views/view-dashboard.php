<?php
require_once "../controllers/controller-dashboard.php"
    ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Dashboard</title>
</head>

<body>
    <button onclick="darkMode()" class="btn-darkMode"><i class="fa-solid fa-sun"></i></button>

    <!-- Main -->
    <h1>
        <?= '<p class="title">Bienvenue ' . $_SESSION['user']['name_entreprise'] . ' ! </p>' ?>
    </h1>
    <aside class="asideDiv2">
        <p>Liste des 5 derniers utilisateurs :</p>

        <?php foreach ($lastfiveusers as $user) { ?>
                        <img src="../assets/img/<?= $user['Image_utilisateur'] ?>" class="profilePicture" alt="image profile" ;>
                        <br>
                        Pseudo : <?= $user['nickname_utilisateur']; ?>
                    </br><hr>
            <?php } ?>

    </aside>

    <aside class="asideDiv1">
        <p>Menu :</p>
        
        <?= 'Image :' . $_SESSION['user']['Image_entreprise'] . '</br> <hr>'; ?>
        <?= 'Nom :' . $_SESSION['user']['name_entreprise'] . '</br> <hr>'; ?>
        <?= 'Email :' . $_SESSION['user']['email_entreprise'] . '</br> <hr>'; ?>
        <?= 'Siret :' . $_SESSION['user']['siretnumber_entreprise'] . '</br> <hr>'; ?>
        <?= 'Adresse :' . $_SESSION['user']['adresse_entreprise'] . '</br> <hr>'; ?>
        <?= 'Ville :' . $_SESSION['user']['city_entreprise'] . '</br></br>'; ?>
        
    </aside>
    <div class="mainDiv">
        <div class="rowDiv1">
            <p>Nombre total d'utilisateur :</p>
            <?= $allUtilisateurs ?>
        </div>

        <div class="rowDiv2">
            <p>Uilisateurs actifs :</p>
            <p>
                <?= $actifUtilisateurs ?>
            </p>

        </div>

        <div class="rowDiv3">
            <p> Nombre total de trajets :</p>
            <p>
                <?= $allTrajets ?>
            </p>
        </div>



        <div class="bottomDiv">
            <p>Liste des 5 derniers trajets d'enregistrés :</p>
            <?php foreach ($lastfivetrajet as $user) { ?>
                <ul>
                    <li>
                        <?= $user['nickname_utilisateur'] . '</br>'; ?>
                        <?= $user['date_trajet'] . '</br>'; ?>
                        <?= $user['distance_trajet'] . ' kms </br>'; ?>
                        <?= $user['Type_modedetransport']; ?>
                    </li>
                </ul>
            <?php } ?>

        </div>


    </div>
    <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer>
    <script src="../assets/js/darkMode.js"></script>

</body>

</html>
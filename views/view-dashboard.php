<?php
require_once "../controllers/controller-dashboard.php"
    ?>
<!DOCTYPE html>
<html lang="fr">
<?php
include 'templates/header.php';
?>
<body>
    
    <!-- Main -->
    <h1>Balenciaga</h1>
    <div class="divFormulaire">

    <?= '<p>Bienvenue ' . $_SESSION['user']['name_entreprise'] . ' ! </p>'?>
       
    <div>
        <p>Nombre total d'utilisateur</p>

        <ul>
        <?php foreach (Entreprise::getAllUsers() as $users) { ?>
            
                <li>
                <?= var_dump($_SESSION)?>
                </li>
                <?php } ?>
            </ul>

    </div>


    </div>
    <footer>
        <?php
        include 'templates/footer.php';
        ?>
    </footer>
    <script src="../assets/js/view-home.js"></script>

</body>

</html>

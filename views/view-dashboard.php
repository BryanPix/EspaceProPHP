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
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard</title>
</head>

<body>
    <button class="btn-darkMode" id="darkModeToggle" onclick="toggleDarkMode()">
        <i class="fa-solid fa-sun iconDark"></i>
        <i class="fa-solid fa-moon iconLight"></i>
    </button>


    <!-- Main -->
    <h1>
        <?= '<p class="title">Bienvenue ' . $_SESSION['user']['name_entreprise'] . ' ! </p>' ?>
    </h1>
    <aside class="asideDiv2">
        <p><b>Liste des 5 derniers utilisateurs :</b></p>

        <?php
        $total = count($lastfiveusers['last_five_users']);
        $i = 1;
        foreach ($lastfiveusers['last_five_users'] as $user) { ?>
            <img src="http://formulairePHP.test/assets/img/<?= $user['Image_utilisateur'] ?>" class="profilePicture"
                alt="image profile" ;>
            <br>
            <b>Pseudo :</b>
            <?= $user['nickname_utilisateur'];
            ; ?>
            </br>
            <?= $i++ != $total ? '<hr>' : '' ?>
        <?php } ?>

    </aside>

    <aside class="asideDiv1">
        <p><b>Menu :</b></p>

        <b>Image :</b>
        <img src="../assets/img/<?= $_SESSION['user']['Image_entreprise'] ?>" class="profilePicture" alt="image profile"
            ;>
        </br>
        <hr>
        <b>Nom :</b>
        <?= $_SESSION['user']['name_entreprise'] . '</br> <hr>'; ?>
        <b>Email :</b>
        <?= $_SESSION['user']['email_entreprise'] . '</br> <hr>'; ?>
        <b>Siret :</b>
        <?= $_SESSION['user']['siretnumber_entreprise'] . '</br> <hr>'; ?>
        <b>Adresse :</b>
        <?= $_SESSION['user']['adresse_entreprise'] . '</br> <hr>'; ?>
        <b>Ville :</b>
        <?= $_SESSION['user']['city_entreprise'] . '</br></br>'; ?>

    </aside>
    <div class="mainDiv">
        <div class="rowDiv1">
            <p><b>Nombre total d'utilisateur: </b>
                <?= $allUsers ?>
            </p>
        </div>
        <div class="rowDiv2">
            <p><b>Uilisateurs actifs: </b>
                <?= $actifUsers ?>
            </p>
        </div>
        <div class="rowDiv3">
            <p><b>Nombre total de trajets : </b>
                <?= $allRides ?>
            </p>

        </div>
        <div class="row">
            <div class="col s4 ">
                <canvas id="doughnutChart"  width="400" height="400"></canvas>
            </div>
        </div>
    </div>
        <div class="rowDiv4">
            <p><b>liste tout les utilisateurs : </b></p>
            <?php
            $total = count($allUsersDisplay);
            $i = 1;
            foreach ($allUsersDisplay as $user) { ?>
                <div class="switch">
                    <br>
                    <img src="http://formulairePHP.test/assets/img/<?= $user['Image_utilisateur'] ?>" class="profilePicture"
                        alt="image profile" ;>
                    <br>
                    <b>Pseudo :</b>
                    <?= $user['nickname_utilisateur'];
                    ; ?>
                    </br>
                    <label>
                        Off
                        <input type="checkbox" data-user-id="<?= $user['id_utilisateur'] ?>" <?= $user['user_validate'] == 1 ? "checked" : "" ?>>
                        <span class="lever"></span>
                        On
                    </label>
                    <br><br>
                        <input type="hidden" name="unvalidate_id" value="<?= $user['id_utilisateur'] ?>">
                    <br>
                    <?= $i++ != $total ? '<hr>' : '' ?>
                </div>
            <?php } ?>


        </div>
    <div class="bottomDiv">
        <p><b>Liste des 5 derniers trajets d'enregistrés :</b></p>
        <?php foreach ($lastfivetrajet['last_five_trajet'] as $user) { ?>
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
    <script>
        document.addEventListener('click', e =>{
            if(e.target.type == 'checkbox'){
                if(e.target.checked == false){
                    console.log('unvalidate');
                    fetch(`controller-ajax.php?unvalidate=${e.target.dataset.userId}`)
                }else{
                    console.log('validate');
                    fetch(`controller-ajax.php?validate=${e.target.dataset.userId}`)

                }
            }
        })
    </script>
    <script>
        // Récupérer les données PHP des stats transports dans une variable JavaScript
        let statsTransports = <?php echo json_encode($statsTransports); ?>;

        // Initialiser les tableaux pour les données et les couleurs
        let data = [];
        let labels = [];
        let backgroundColors = [];
        let borderColors = [];
        // Générer des couleurs aléatoires
        function generateRandomColor() {
            let r = Math.floor(Math.random() * 256);
            let g = Math.floor(Math.random() * 256);
            let b = Math.floor(Math.random() * 256);
            return 'rgba(' + r + ',' + g + ',' + b + ')';
        }
        // Itérer à travers les données de transport
        statsTransports.forEach(function (stat) {
            labels.push(stat.Type_modedetransport); // Modification ici pour utiliser la bonne clé
            data.push(stat.stats);
            let randomColor = generateRandomColor();
            backgroundColors.push(randomColor);
            borderColors.push(randomColor.replace('0.2', '1'));
        });

        // Générer le graphique Doughnut
        let ctx = document.getElementById('doughnutChart').getContext('2d');
        let doughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre de trajets',
                    data: data,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            generateLabels: function (chart) {
                                let data = chart.data;
                                if (data.labels.length && data.datasets.length) {
                                    return data.labels.map(function (label, i) {
                                        let ds = data.datasets[0];
                                        return {
                                            text: label + ': ' + ds.data[i], // Ajouter le nom de transport et la valeur
                                            fillStyle: ds.backgroundColor[i],
                                            hidden: isNaN(ds.data[i]),
                                            lineCap: 'round',
                                            fontColor: '#080808'
                                        };
                                    });
                                }
                                return [];
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>
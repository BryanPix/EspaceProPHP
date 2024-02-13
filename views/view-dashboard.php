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
    <h1>
        <?= '<p class="title">Bienvenue ' . $_SESSION['user']['name_entreprise'] . ' ! </p>' ?>
    </h1>
    <aside class="asideDiv2">
        <p>Liste des 5 derniers utilisateurs :</p>

        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam magni dolor officia ut eveniet laborum, doloremque obcaecati fuga asperiores id expedita similique, error temporibus quia eos voluptas. Mollitia vero corrupti accusantium voluptas autem modi ducimus consequuntur quas, ipsum optio ad, dolore et obcaecati quidem in quod perspiciatis ipsa culpa dolorem quasi iste illo. Reiciendis quae distinctio velit voluptatem molestiae a tempore. Adipisci rerum architecto tempore consequuntur, laudantium rem autem vel, voluptas totam, excepturi necessitatibus. Excepturi voluptate odit laboriosam perspiciatis, soluta mollitia nesciunt? Rem molestias pariatur reprehenderit dignissimos obcaecati. Fugit adipisci quia at, earum vitae blanditiis, eum error dolor labore possimus tempore voluptas? Voluptatum incidunt iste molestias reiciendis, voluptatem dolorum omnis amet voluptas? Porro, rerum in esse sunt fugit pariatur expedita est quaerat obcaecati assumenda veritatis dignissimos delectus accusantium, placeat quasi libero possimus incidunt! Fuga laborum esse reprehenderit, dolor doloribus incidunt nihil beatae, et sunt dolorum eligendi voluptatibus officiis temporibus earum eaque quisquam eveniet, ad qui voluptas cupiditate sapiente quaerat necessitatibus praesentium quasi. Aspernatur voluptatum similique labore, ut quos veritatis quasi, ipsam dolores quas libero, cum deleniti unde dolorum neque! Quo, maxime nostrum repellat similique veniam magnam deserunt, deleniti nulla placeat, exercitationem debitis iure. Cumque earum mollitia possimus optio cum, quae adipisci provident! Fugit tenetur vel rerum quos nulla corporis debitis? Porro eos illo quod minima aperiam beatae sapiente in perspiciatis voluptatem? Dignissimos soluta praesentium repudiandae unde quaerat neque voluptas iusto. Quo odio ut laboriosam minus fuga nulla placeat, iusto dicta illo dolorum maiores quisquam. Natus, ut magni nostrum omnis inventore voluptate reprehenderit eaque soluta corporis. Doloremque assumenda reprehenderit repellendus saepe quia soluta, praesentium labore cumque voluptatibus ut vel eaque expedita odit atque perferendis facilis consequatur voluptas enim consectetur porro. Laboriosam magni consectetur harum saepe itaque, quisquam suscipit aut! Distinctio autem recusandae commodi totam numquam optio voluptatibus, animi, molestias quia sint sunt nulla facere dolorum a sed? Velit aspernatur nostrum molestias sit aut deleniti mollitia cumque quaerat commodi quisquam a voluptate quas, repudiandae at, totam dolore quod 
        </p>

    </aside>

    <aside class="asideDiv1">
        <p>Menu :</p>

        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam magni dolor officia ut eveniet laborum, doloremque obcaecati fuga asperiores id expedita similique, error temporibus quia eos voluptas. Mollitia vero corrupti accusantium voluptas autem modi ducimus consequuntur quas, ipsum optio ad, dolore et obcaecati quidem in quod perspiciatis ipsa culpa dolorem quasi iste illo. Reiciendis quae distinctio velit voluptatem molestiae a tempore. Adipisci rerum architecto tempore consequuntur, laudantium rem autem vel, voluptas totam, excepturi necessitatibus. Excepturi voluptate odit laboriosam perspiciatis, soluta mollitia nesciunt? Rem molestias pariatur reprehenderit dignissimos obcaecati. Fugit adipisci quia at, earum vitae blanditiis, eum error dolor labore possimus tempore voluptas? Voluptatum incidunt iste molestias reiciendis, voluptatem dolorum omnis amet voluptas? Porro, rerum in esse sunt fugit pariatur expedita est quaerat obcaecati assumenda veritatis dignissimos delectus accusantium, placeat quasi libero possimus incidunt! Fuga laborum esse reprehenderit, dolor doloribus incidunt nihil beatae, et sunt dolorum eligendi voluptatibus officiis temporibus earum eaque quisquam eveniet, ad qui voluptas cupiditate sapiente quaerat necessitatibus praesentium quasi. Aspernatur voluptatum similique labore, ut quos veritatis quasi, ipsam dolores quas libero, cum deleniti unde dolorum neque! Quo, maxime nostrum repellat similique veniam magnam deserunt, deleniti nulla placeat, exercitationem debitis iure. Cumque earum mollitia possimus optio cum, quae adipisci provident! Fugit tenetur vel rerum quos nulla corporis debitis? Porro eos illo quod minima aperiam beatae sapiente in perspiciatis voluptatem? Dignissimos soluta praesentium repudiandae unde quaerat neque voluptas iusto. Quo odio ut laboriosam minus fuga nulla placeat, iusto dicta illo dolorum maiores quisquam. Natus, ut magni nostrum omnis inventore voluptate reprehenderit eaque soluta corporis. Doloremque assumenda reprehenderit repellendus saepe quia soluta, praesentium labore cumque voluptatibus ut vel eaque expedita odit atque perferendis facilis consequatur voluptas enim consectetur porro. Laboriosam magni consectetur harum saepe itaque, quisquam suscipit aut! Distinctio autem recusandae commodi totam numquam optio voluptatibus, animi, molestias quia sint sunt nulla facere dolorum a sed? Velit aspernatur nostrum molestias sit aut deleniti mollitia cumque quaerat commodi quisquam a voluptate quas, repudiandae at, totam dolore quod 
        </p>
    </aside>
    <div class="mainDiv">
        <div class="rowDiv1">
            <p>Nombre total d'utilisateur :</p>   
                       <?= $allUtilisateurs?>
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
            <!-- <?php foreach($users as $user) { ?>
                <?= $lastfiveusers ?>

            <?php } ?> -->
        
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
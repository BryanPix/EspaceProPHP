<?php

class Entreprise
{
    /**
     * @param string $name Nom de l'entreprise
     * @param string $mail Addresse mail de l'entreprise
     * @param int $siret numéro de siret de l'entreprise
     * @param string $adresse Adresse de l'entreprise
     * @param int $zipcode Code postal de l'entreprise
     * @param string $city ville de l'entreprise
     * @param string $password mot de passe de l'entreprise
     * 
     * @return void 

    */

    public static function create(string $name, string $mail, int $siret, string $adresse, int $zipcode, string $city, string $password)
    {
        // try and catch
        try {
            // Création d'un objet $db selon la classe PDO 
            // Connextion à la bdd
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);
            // stockage de la requete dans une variable
            $sql = "INSERT INTO `entreprise` (`name_entreprise`,`email_entreprise`,`siretnumber_entreprise`,`adresse_entreprise`,`zipcode_entreprise`,`city_entreprise`,`password_entreprise`) VALUES (:name_entreprise, :email_entreprise, :siretnumber_entreprise, :adresse_entreprise, :zipcode_entreprise, :city_entreprise, :password_entreprise)";

            $query = $db->prepare($sql);

            // on relie les valeurs à nos marqueurs à l'aide d'un bindValue
            $query->bindValue(':name_entreprise', htmlspecialchars($name), PDO::PARAM_STR);
            $query->bindValue(':email_entreprise', $mail, PDO::PARAM_STR);
            $query->bindValue(':siretnumber_entreprise', $siret, PDO::PARAM_INT);
            $query->bindValue(':adresse_entreprise', $adresse, PDO::PARAM_STR);
            $query->bindValue(':zipcode_entreprise', $zipcode, PDO::PARAM_INT);
            $query->bindValue(':city_entreprise', $city, PDO::PARAM_STR);
            $query->bindValue(':password_entreprise', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }

    }
    /**
     * Methode permettant de récupérer les informations d'un utilisateur avec son mail comme paramètre
     * 
     * @param string $mail Adresse mail de l'utilisateur
     * 
     * @return bool
     */
    public static function checkMailExists(string $mail): bool
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `entreprise` WHERE `email_entreprise` = :email_entreprise";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':email_entreprise', $mail, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on vérifie si le résultat est vide car si c'est le cas, cela veut dire que le mail n'existe pas
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant de récupérer les infos d'un utilisateur avec son mail comme paramètre
     * 
     * @param string $mail Adresse mail de l'utilisateur
     * 
     * @return array Tableau associatif contenant les infos de l'utilisateur
     */
    public static function getInfos(string $mail): array
    {
        try {

            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `entreprise` WHERE `email_entreprise` = :email_entreprise";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':email_entreprise', $mail, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant de récupérer les infos d'un utilisateur avec l'id de l'entreprise comme paramètre
     * 
     * @param string $idEntreprise Id de l'entreprise
     * 
     * @return array Tableau associatif contenant les infos de l'utilisateur
     */
    public static function getAllUsers(int $idEntreprise): string
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `entreprise` NATURAL JOIN `utilisateur` WHERE `ID_Entreprise` = :ID_Entreprise; ";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':ID_Entreprise', $idEntreprise, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();


            // on récupère le nombre d'utilisateurs actifs
            $count = $query->rowCount();

            // on retourne le nombre d'utilisateurs actifs
            // on retourne le nombre d'utilisateurs actifs
            return json_encode([
                'status' => 'success',
                'active_users' => $count
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'status' => 'error',
                'message' => 'Erreur : ' . $e->getMessage()
            ]);
        }
    }


    public static function getActifUtilisateurs(int $idEntreprise): string
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT DISTINCT utilisateur.*
        FROM `utilisateur`
        JOIN `trajet` ON utilisateur.`id_utilisateur` = trajet.`id_utilisateur`
        WHERE utilisateur.`ID_Entreprise` = :ID_Entreprise;";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':ID_Entreprise', $idEntreprise, PDO::PARAM_INT);

            // on execute la requête
            $query->execute();

            // on récupère le nombre d'utilisateurs actifs
            $count = $query->rowCount();



            // on retourne le nombre d'utilisateurs actifs
            return json_encode([
                'status' => 'success',
                'active_users' => $count
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'status' => 'error',
                'message' => 'Erreur : ' . $e->getMessage()
            ]);
        }
    }
    public static function getAllTrajets(int $idEntreprise): string
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT count('id_trajet') AS 'total_trajets' FROM `trajet` 
        JOIN `utilisateur` ON trajet.`id_utilisateur` = utilisateur.`id_utilisateur`
        WHERE `ID_Entreprise` = :ID_Entreprise;";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':ID_Entreprise', $idEntreprise, PDO::PARAM_INT);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);


            return json_encode([
                'status' => 'success',
                'total_trajets' => $result
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'status' => 'error',
                'message' => 'Erreur : ' . $e->getMessage()
            ]);
        }
    }
    public static function getLastFiveUsers(int $idEntreprise): string
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT `Image_utilisateur`, `nickname_utilisateur` FROM `utilisateur` 
        WHERE `ID_Entreprise` = :ID_Entreprise
        ORDER BY `id_utilisateur` DESC LIMIT 5";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':ID_Entreprise', $idEntreprise, PDO::PARAM_INT);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return json_encode([
                'status' => 'success',
                'last_five_users' => $result
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'status' => 'error',
                'message' => 'Erreur : ' . $e->getMessage()
            ]);
        }
    }
    public static function getOneUser(int $idUtilisateur): string
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `utilisateur`
            WHERE `id_utilisateur` = :id_utilisateur";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':id_utilisateur', $idUtilisateur, PDO::PARAM_INT);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return json_encode([
                'status' => 'success',
                'one_user' => $result
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'status' => 'error',
                'message' => 'Erreur : ' . $e->getMessage()
            ]);
        }
    }

    public static function getTransportStats(int $idEntreprise): string
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            $sql = "SELECT Type_modedetransport, COUNT(*) as stats FROM `modedetransport` 
                    NATURAL JOIN `utilisateur`
                    NATURAL JOIN `entreprise`
                    NATURAL JOIN `trajet`
                    where ID_Entreprise = :ID_Entreprise
                    GROUP BY Type_modedetransport;";
            $query = $db->prepare($sql);
            $query->bindValue(':ID_Entreprise', $idEntreprise, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    public static function getAllUsersDisplay(int $idEntreprise): string
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT `Image_utilisateur`, `nickname_utilisateur`,`user_validate`, `id_utilisateur` FROM `utilisateur` 
        WHERE `ID_Entreprise` = :ID_Entreprise
        ORDER BY `id_utilisateur`";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':ID_Entreprise', $idEntreprise, PDO::PARAM_INT);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return json_encode([
                'status' => 'success',
                'all_users' => $result
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'status' => 'error',
                'message' => 'Erreur : ' . $e->getMessage()
            ]);
        }
    }



    public static function getLastFiveTrajet(int $idEntreprise): string
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            $sql = "SELECT trajet.`date_trajet`, trajet.`distance_trajet`, utilisateur.`nickname_utilisateur` , modedetransport.`Type_modedetransport`
        FROM `trajet`
        JOIN `utilisateur`  ON trajet.`id_utilisateur` = utilisateur.`id_utilisateur`
        JOIN `modedetransport` ON trajet.`id_modedetransport` = modedetransport.`id_modedetransport`
        JOIN `entreprise`  ON utilisateur.`ID_Entreprise` = entreprise.`ID_Entreprise`
        WHERE entreprise.`ID_Entreprise` = :ID_Entreprise
        ORDER BY trajet.`date_trajet` DESC 
        LIMIT 5";

            $query = $db->prepare($sql);
            $query->bindValue(':ID_Entreprise', $idEntreprise, PDO::PARAM_INT);

            $query->execute();

            // Récupérer tous les résultats
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return json_encode([
                'status' => 'success',
                'last_five_trajet' => $result
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'status' => 'error',
                'message' => 'Erreur : ' . $e->getMessage()
            ]);
        }
    }

    /**
     * methode qui permer de déboloquer l'utilisateur
     * @param int $userId parametre qui recuper l'id de l'utilisateur
     * 
     * @return bool
     */

    public static function unvalidate(int $userId): bool
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            $sql = "UPDATE `utilisateur` SET `user_validate` = 0 WHERE `id_utilisateur` = :id_utilisateur";
            $query = $db->prepare($sql);
            $query->bindValue(':id_utilisateur', $userId, PDO::PARAM_INT);
            $query->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * methode qui permer de boloquer l'utilisateur
     * @param int $userId parametre qui recuper l'id de l'utilisateur
     * 
     * @return bool
     */

    public static function validate(int $userId): bool
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);


            $sql = "UPDATE `utilisateur` SET `user_validate` = 1 WHERE `id_utilisateur` = :id_utilisateur";
            $query = $db->prepare($sql);
            $query->bindValue(':id_utilisateur', $userId, PDO::PARAM_INT);
            $query->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public static function deleteEntreprise(int $idEntreprise)
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASSWORD);

            $sql = "DELETE FROM entreprise WHERE ID_Entreprise = :ID_Entreprise";
            $query = $db->prepare($sql);
            $query->bindValue(':ID_Entreprise', $idEntreprise, PDO::PARAM_INT);
            $query->execute();

            // Détruire la session
            session_destroy();

            // Supprimer le mot de passe de la session
            unset($_SESSION['password_entreprise']);

            return true;
        } catch (PDOException $e) {
            // Si une erreur se produit, retourner le message d'erreur
            return 'Erreur : ' . $e->getMessage();
        }
    }
}
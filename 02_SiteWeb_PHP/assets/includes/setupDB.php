<?php
// https://github.com/cegepdefi

class DatabaseManager
{
    private $ipServeurSQL = "localhost";
    private $nomUtilisateurSQL = "root";
    private $motDePasse = "";
    private $nomDB = "nom_base_de_données";
    private $nomTable = "nom_table";
    private $conn;

    public function __construct()
    {
        // Créer une connexion
        $this->conn = new mysqli($this->ipServeurSQL, $this->nomUtilisateurSQL, $this->motDePasse);

        // Vérifier la connexion
        if ($this->conn->connect_error) {
            die("La connexion a échoué: " . $this->conn->connect_error);
        }
    }

    public function verifierExisteDB($getNomDB)
    {
        // Essayez de sélectionner la base de données
        try {
            $dbSelected = $this->conn->select_db($getNomDB);
            return $dbSelected;
        } catch (mysqli_sql_exception $e) {
            error_log($e->getMessage()); // Log del error para el desarrollador
            return false; // Retornar false sin mostrar el error al usuario
        }
    }

    public function verifierExisteTable($getConDB, $getNomTable)
    {
        try {
            $resulta = $getConDB->query("SELECT 1 FROM $getNomTable LIMIT 1");
            return $resulta !== false;
        } catch (Exception $e) {
            // La excepción se lanza si la tabla no existe
            return false;
        }
    }

    public function creerDB()
    {
        if ($this->verifierExisteDB($this->nomDB) === TRUE) {
            echo "La base de données existe déjà";
        } else {
            $sql = "CREATE DATABASE IF NOT EXISTS $this->nomDB";
            if ($this->conn->query($sql) === TRUE) {
                echo "La base de données '$this->nomDB' a été créé avec succès.";
            } else {
                echo "Erreur lors de la création de la base de données : " . $this->conn->error;
            }
        }
    }

    public function creerTable()
    {
        if ($this->verifierExisteDB($this->nomDB) === TRUE) {
            // Sélectionnez la base de données
            $this->conn->select_db($this->nomDB);

            if ($this->verifierExisteTable($this->conn, $this->nomTable) === TRUE) {
                echo "Le tableau [" . $this->nomTable . "] existe déjà";
            } else {
                // Code SQL pour créer une table
                $sql = "CREATE TABLE IF NOT EXISTS $this->nomTable (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(50) NOT NULL,
                salaire DECIMAL(10, 2),
                ville VARCHAR(50),
                photo VARCHAR(255)
            )";

                if ($this->conn->query($sql) === TRUE) {
                    $this->remplirTable();
                    echo "Le Table '$this->nomTable' a été créé avec succès.";
                } else {
                    echo "Erreur lors de la création Table : " . $this->conn->error;
                }
            }
        } else {
            echo "La base de données [" . $this->nomDB . "] n'existe pas";
        }
    }

    public function remplirTable()
    {
        if ($this->verifierExisteDB($this->nomDB) === TRUE) {
            // Sélectionnez la base de données
            $this->conn->select_db($this->nomDB);
            if ($this->verifierExisteTable($this->conn, $this->nomTable) === TRUE) {
                $nom_table = array(
                    array('id' => '1', 'nom' => 'Matthieu', 'salaire' => '25.00', 'ville' => 'montreal', 'photo' => 'https://img.freepik.com/photos-gratuite/rendu-3d-personnage-dessin-anime-lunettes-veste_1142-51310.jpg?w=740&t=st=1717317482~exp=1717318082~hmac=5eafa6bfcc31b0df5aa0ce1a84c2f605bdb4f974bd2408112ae371b06fcbda54'),
                    array('id' => '2', 'nom' => 'Valentine', 'salaire' => '30.00', 'ville' => 'montreal', 'photo' => 'https://img.freepik.com/photos-gratuite/avatar-androgyne-personne-queer-non-binaire_23-2151100226.jpg?t=st=1717316973~exp=1717317573~hmac=7e90bed0c43913bfc7a3632eba2d63c3c9ab39413a69b8a3dc272a20ff2e63c3'),
                    array('id' => '3', 'nom' => 'Alexandre', 'salaire' => '40.00', 'ville' => 'toronto', 'photo' => 'https://img.freepik.com/photos-gratuite/portrait-jeune-homme-lunettes-costume-rendu-3d_1142-43524.jpg?t=st=1717316973~exp=1717317573~hmac=329fd8543b3042c03468c63f87cee1b9ba963200f58213cc5ce0ef452c333b07'),
                    array('id' => '4', 'nom' => 'Sophie', 'salaire' => '35.00', 'ville' => 'vancouver', 'photo' => 'https://img.freepik.com/photos-gratuite/illustration-3d-jeune-fille-foulard-noir_1142-51578.jpg?w=740&t=st=1717317182~exp=1717317782~hmac=10df34a4248faf87b9f4293a48ccdec90f671fd1e37e6e523a80e5d1ded03494'),
                    array('id' => '5', 'nom' => 'Camila', 'salaire' => '25.00', 'ville' => 'quebec', 'photo' => 'https://img.freepik.com/photos-gratuite/personnage-dessin-anime-3d_23-2151033973.jpg?w=740&t=st=1717317275~exp=1717317875~hmac=d941cb70696ed72e6c839697bef29e6dc1859a100a61a7771ef0fcd47bcd644b'),
                    array('id' => '6', 'nom' => 'Lucas', 'salaire' => '25.00', 'ville' => 'quebec', 'photo' => 'https://img.freepik.com/photos-gratuite/portrait-bel-homme-hipster-lunettes-rendu-3d_1142-51612.jpg?w=740&t=st=1717317319~exp=1717317919~hmac=f949ec6a88e510a8bfe10c1ede22ff4b8eeda8391c208c69f5f082cdda980c5b')
                );
                foreach ($nom_table as $donnee) {
                    $requete = "INSERT INTO $this->nomTable (id, nom, salaire, ville, photo) VALUES ('" . $donnee['id'] . "', '" . $donnee['nom'] . "', '" . $donnee['salaire'] . "', '" . $donnee['ville'] . "', '" . $donnee['photo'] . "')";
                    if ($this->conn->query($requete) === TRUE) {
                        // echo "Nouvel enregistrement créé avec succès";
                    } else {
                        echo "[ERROR]: " . $requete . "<br>" . $this->conn->error;
                    }
                }
            } else {
                echo "Le tableau [" . $this->nomTable . "] n'existe pas";
            }
        } else {
            echo "La base de données [" . $this->nomDB . "] n'existe pas";
        }
    }

    public function supprimerDB()
    {
        if ($this->verifierExisteDB($this->nomDB) === TRUE) {
            // Code SQL pour supprimer la base de données
            $sqlDB = "DROP DATABASE IF EXISTS $this->nomDB";
            if ($this->conn->query($sqlDB) === TRUE) {
                echo "La base de données '$this->nomDB' a été supprimé avec succès.";
            } else {
                echo "Erreur lors de la suppression de la base de données : " . $this->conn->error;
            }
        } else {
            echo "La base de données [" . $this->nomDB . "] n'existe pas";
        }
    }

    public function __destruct()
    {
        // Fermer la connexion
        $this->conn->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['accion'] == 'creerDB') {
    $manager = new DatabaseManager(); // Pour utiliser la classe
    echo $manager->creerDB();
    unset($manager); // Cela appellera __destruct() et fermera la connexion
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['accion'] == 'creerTable') {
    $manager = new DatabaseManager(); // Pour utiliser la classe
    echo $manager->creerTable();
    unset($manager); // Cela appellera __destruct() et fermera la connexion
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['accion'] == 'supprimerDB') {
    $manager = new DatabaseManager(); // Pour utiliser la classe
    echo $manager->supprimerDB();
    unset($manager); // Cela appellera __destruct() et fermera la connexion
}
?>
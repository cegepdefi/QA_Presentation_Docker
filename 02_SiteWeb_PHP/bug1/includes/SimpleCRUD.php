<?php
class SimpleCRUD
{
    private $ipServeurSQL = "localhost";
    private $nomUtilisateurSQL = "root";
    private $motDePasse = "";
    private $nomDB = "nom_base_de_données";
    private $nomTable = "nom_table";
    private $conn;

    public function __construct()
    {
        // Crear una conexión y seleccionar la base de datos
        $this->conn = new mysqli($this->ipServeurSQL, $this->nomUtilisateurSQL, $this->motDePasse, $this->nomDB);

        // Vérifier la connexion
        if ($this->conn->connect_error) {
            die("La connexion a échoué: " . $this->conn->connect_error);
        }
    }

    public function verifierExisteTable($getConDB, $getNomTable)
    {
        try {
            $resulta = $getConDB->query("SELECT 1 FROM $getNomTable LIMIT 1");
            if ($resulta instanceof mysqli_result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    // Créer un nouvel enregistrement
    public function creerNouveauEmploye($linkphoto, $nom, $salaire, $ville)
    {
        if ($this->verifierExisteTable($this->conn, $this->nomTable) === true) {
            $sql = "INSERT INTO `nom_table` (`nom`, `salaire`, `ville`, `photo`) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            if ($stmt === false) {
                return "Erreur: " . $this->conn->error;
            }
            $stmt->bind_param("sdss", $nom, $salaire, $ville, $linkphoto);
            if ($stmt->execute()) {
                return "Nouvel enregistrement créé avec succès";
            } else {
                return "Erreur: " . $stmt->error;
            }
        } else {
            return "Erreur: La table [$this->nomTable] n'existe pas";
        }
    }


    // Lire tous les enregistrements
    public function optenirListeEmployesJson()
    {
        $sql = "SELECT * FROM $this->nomTable";
        $resultat = $this->conn->query($sql);

        $donnees = array();
        if ($resultat->num_rows > 0) {
            while ($row = $resultat->fetch_assoc()) {
                $donnees[] = $row;
            }
        }
        return json_encode($donnees);
    }

    public function trouverEmploye($getId)
    {
        // Preparar la consulta SQL para obtener los datos del empleado por su ID
        $sql = "SELECT * FROM $this->nomTable WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $getId); // "i" indica que la variable $id es de tipo entero

        // Ejecutar la consulta
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Verificar si se encontró el empleado
        if ($resultado->num_rows > 0) {
            // Obtener los datos del empleado en forma de array asociativo
            $empleado = $resultado->fetch_assoc();
            // Devolver los datos en formato JSON
            return json_encode($empleado);
        } else {
            return json_encode(array('error' => 'No se encontró el empleado con el ID proporcionado.'));
        }
    }

    // Mettre à jour un enregistrement existant
    public function modifierEmploye($id, $linkphoto, $nom, $salaire, $ville)
    {
        $sql = "UPDATE $this->nomTable SET `nom` = '$nom', `salaire` = '$salaire', `ville` = '$ville', `photo` = '$linkphoto' WHERE `nom_table`.`id` = $id ";
        if ($this->conn->query($sql) === TRUE) {
            return "Enregistrement mis à jour avec succès";
        } else {
            return "Erreur lors de la mise à jour de l'enregistrement: " . $this->conn->error;
        }
    }

    // Supprimer un enregistrement
    public function supprimerEmploye($id)
    {
        $sql = "DELETE FROM $this->nomTable WHERE id=$id";
        if ($this->conn->query($sql) === TRUE) {
            return "Enregistrement supprimé avec succès";
        } else {
            return "Erreur de suppression d'enregistrement: " . $this->conn->error;
        }
    }

    public function __destruct()
    {
        // Fermer la connexion
        $this->conn->close();
    }
}
?>
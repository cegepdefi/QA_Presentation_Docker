<?php
// inclure la class CRUD
include_once ("./SimpleCRUD.php");

// Vérifiez si le numéro d'employé a été reçu par la méthode GET ou POST
if (isset($_GET['id']) || isset($_POST['id'])) {
    $id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];
    $SimpleCRUD = new SimpleCRUD();
    echo $SimpleCRUD->trouverEmploye($id);
} else {
    echo json_encode(array('error' => 'ID employe pas trouve.'));
}
?>
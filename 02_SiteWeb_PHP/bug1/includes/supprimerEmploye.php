<?php
include_once ("./SimpleCRUD.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $SimpleCRUD = new SimpleCRUD();
    $id = $_POST['id'];
    $resultado = $SimpleCRUD->supprimerEmploye($id);

    if ($resultado == "Enregistrement supprimé avec succès") {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
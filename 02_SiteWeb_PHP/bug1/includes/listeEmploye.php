<?php
include_once ("./SimpleCRUD.php");

$SimpleCRUD = new SimpleCRUD();
header('Content-Type: application/json');
echo $SimpleCRUD->optenirListeEmployesJson();
?>
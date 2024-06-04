<?php
// https://github.com/cegepdefi

// Vérifiez si tous les paramètres sont présents
if (isset($_POST['id'], $_POST['linkphoto'], $_POST['nom'], $_POST['salaire'], $_POST['ville'])) {
    // Désinfectez chaque élément
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $linkphoto = filter_input(INPUT_POST, 'linkphoto', FILTER_SANITIZE_URL);
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $salaire = filter_input(INPUT_POST, 'salaire', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $ville = filter_input(INPUT_POST, 'ville', FILTER_SANITIZE_STRING);

    // Assurez-vous que le salaire est un nombre
    if (filter_var($salaire, FILTER_VALIDATE_FLOAT) !== false) {
        // Toutes les données sont présentes et valides
        // Traiter les données ici

        // inclure la class CRUD
        include_once ("./SimpleCRUD.php");

        // Exemple d'utilisation :
        $crud = new SimpleCRUD();

        // Créer un nouvel enregistrement
        $crud->modifierEmploye($id, $linkphoto, $nom, $salaire, $ville);

    } else {
        echo "Le salaire doit être un chiffre.";
    }
} else {
    echo "\n[ERROR] Pas tous les paramètres sont présents dans le POST.";
    // Envoyer une réponse au client
    echo "linkphoto : " . $_POST['linkphoto'] . "\n";
    echo "nom : " . $_POST['nom'] . "\n";
    echo "salaire : " . $_POST['salaire'] . "\n";
    echo "ville : " . $_POST['ville'] . "\n";
}
?>
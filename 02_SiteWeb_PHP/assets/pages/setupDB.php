<script>
    document.cookie = "url=" + window.location.href;
</script>

<?php
// Obtenez le domaine et le port actuels
$domaine = parse_url($_COOKIE['url']);
// Construire l'URL de destination
$urlDestination = $domaine['scheme'] . $domaine['host'] . "/phpmyadmin";
?>

<div id="baseDeDonnees" class="baseDeDonnees">
    <button id="btn_PhpMyAdmin" onclick="window.location.href='<?php echo $urlDestination; ?>'">ouvrir phpMyAdmin</button>
    <button id="btn_CreerDB" onclick="ejecutarScript('creerDB')">Créer la base de données</button>
    <button id="btn_CreerTable" onclick="ejecutarScript('creerTable')">Créer le tableau</button>
    <button id="btn_SupprimerDB" onclick="ejecutarScript('supprimerDB')">Supprimer la base de données et le tableau</button>
</div>

<script>
    function ejecutarScript(getCual) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./assets/includes/setupDB.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        };
        // Envoyer un paramètre que le script PHP peut vérifier pour appeler la fonction createDBYTable
        xhr.send(`accion=${getCual}`);
    }
</script>
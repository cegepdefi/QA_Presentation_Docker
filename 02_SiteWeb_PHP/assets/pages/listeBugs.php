<!-- https://github.com/cegepdefi -->

<script>
    function toggleText(getID) {
        var text = document.getElementById(getID);
        if (text.style.display === "none") {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>


<section class="card-group m-3 p-3 gap-5 shadow">

    <script>
        document.cookie = "url=" + window.location.href;
    </script>
    <?php
        $urlMain = $_COOKIE['url'];
    ?>

    <div class="container-xl">
        <h1>Environnement de test <span style="font-size: 20px;">v1.0</spans>
                <p>
                    Une page avec un tableau qui contient une liste de 6 employés avec leur id, photo de profil, nom,
                    salaire et ville.
                </p>
        </h1>
        <br>
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-10">
                            <h2>(QA) Assurance qualité - Tester et trouver des bugs
                                <span style="font-size: 20px;">c'est fun!</spans>
                            </h2>
                        </div>
                    </div>
                </div>
                <table id="laTable" class="table table-striped table-hover table-bordered" style="text-align: center;">
                    <thead>
                        <tr>
                            <th id="th_Id">#</th>
                            <th id="th_VoirPage">Voir la page</th>
                            <th id="th_Description">Description</th>
                            <th id="th_Checkbox">Bug trouvé</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $listDescription = array(
                            "1: Tester le CRUD (Create, Read, Update et Delete).
                            <ol>
                            <li>Lorsque vous entrez sur la page, 6 employés doivent apparaître avec leur id, photo de profil, nom, salaire et ville.</li>
                            <li>Créer/Ajouter un nouvel employé à la liste.</li>
                            <li>Modifier un employé sur la liste.</li>
                            <li>Supprimer un employé de la liste.</li>
                            </ol>",
                            "2: API cachées.
                            <ol>
                            <li>Trouver l'API cachée qui affiche toutes les informations de chaque employé.</li>
                            <li>Trouver l'API cachée qui permet de modifier les données d'un employé avec l'ID.</li>
                            <li>Trouver l'API cachée qui vous permet de supprimer un employé avec l'ID.</li>
                            </ol>"
                        );
                        $listResponse = array(
                            "<ol class='afficherReponseBug' style='color:red;'>
                            <li>Erreur de connexion à la base de données. [Vous devez d'abord créer la base de données et la table].</li>
                            <li>Erreur lors de l'exécution d'une requête SQL. [La table de la base de données n'existe pas ou est mal formée].</li>
                            </ol>
                            ",
                            "<ol class='afficherReponseBug' style='color:red;'>
                            <li>le même employé peut être répété.</li>
                            <li>Postman peut être utilisé pour manipuler les données des employés et mettre des valeurs qui ne sont pas censées être autorisées. 'Exemple : mettre un point ou une virgule dans la valeur du salaire'.</li>
                            </ol>
                            "
                        );
                        // Ouvrir la Boucle for pour replir table.
                        for ($i = 0; $i < count($listDescription); $i++) {
                            $id = $i + 1;
                            $discriptionBug = $listDescription[$i];
                            $responseBug = $listResponse[$i];
                            ?>

                            <tr>
                                <td id="td_Id_<?php echo $id; ?>">
                                    <?php echo $id; ?>
                                </td>
                                <td id="td_VoirPage_<?php echo $id; ?>">
                                    <a href="<?php echo $urlMain . 'bug1/'; ?>" id="btn_VoirPage_<?php echo $id; ?>" class="btn btn-secondary btn-lg active"
                                        role="button" aria-pressed="true">
                                        Voir page
                                    </a>
                                </td>
                                <td id="td_Description_<?php echo $id; ?>" class="tableEmployeDescription">
                                    <?php echo $discriptionBug; ?>
                                    </br></br>
                                    <button onclick="toggleText(<?php echo $id; ?>)" id="btn_AfficherReponse_<?php echo $id; ?>">afficher la reponse
                                        bug<?php echo $id; ?></button>
                                    <div id="<?php echo $id; ?>" style="display:none;">
                                        <?php echo $responseBug; ?>
                                    </div>
                                </td>
                                <td id="td_Checkbox_<?php echo $id; ?>">
                                    <input type="checkbox" id="miCheckbox_<?php echo $id; ?>">
                                </td>
                            </tr>

                            <?php
                            // Fermer la Boucle for pour replir table.
                        }
                        // Fermer la connexion ver DB
                        // Vider
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
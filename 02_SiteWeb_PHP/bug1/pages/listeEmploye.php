<!-- https://github.com/cegepdefi -->

<section class="card-group m-3 p-3 gap-5 shadow">

    <?php
    $urlMain = "http://" . $_SERVER['HTTP_HOST'];
    include_once ("./pages/creerEmploye.php");
    include_once ("./pages/modifierEmploye.php");
    ?>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2>Liste des employés</h2>
                        </div>
                        <div class="col-sm-4">
                            <button id="creerEmploye" class="btn btn-success btn-block" data-toggle="modal"
                                data-target="#formAjouterEmploye">Ajouter un
                                employé</button>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered" id="tableauDonees">
                    <thead>
                        <tr>
                            <th># ID</th>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Salaire</th>
                            <th>Ville</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<script>
    // Recuperer les donnees en format JSON et Remplir table html
    function remplir_LeTableau() {
        $.ajax({
            url: './includes/listeEmploye.php',
            type: 'get',
            dataType: 'json',
            success: function (donees) {
                var filas = '';
                $.each(donees, function (index, getDonnee) {
                    filas += `
                    <tr id="trEmploye_${getDonnee.id}">
                        <td id="idEmploye_${getDonnee.id}"> ${getDonnee.id} </td>
                        <td> <img id="imgEmploye_${getDonnee.id}" src="${getDonnee.photo}" width="100" height="100" /> </td>
                        <td id="nomEmploye_${getDonnee.id}"> ${getDonnee.nom} </td>
                        <td id="salaireEmploye_${getDonnee.id}"> ${getDonnee.salaire} </td>
                        <td id="villeEmploye_${getDonnee.id}"> ${getDonnee.ville} </td>
                        <td>
                            <a href="#"
                            id="modifierEmploye_${getDonnee.id}" class="modifier" title="modifier"
                            data-toggle="tooltip">
                                <i class="material-icons">&#xE254;</i>
                            </a>
                            <a href="#" id="SupprimerEmploye_${getDonnee.id}" class="Supprimer" title="Supprimer" data-toggle="tooltip">
                                <i class="material-icons">&#xE872;</i> <!-- Icono de Supprimer -->
                            </a>
                        </td>
                    </tr>
                    `;
                });
                $('#tableauDonees tbody').html(filas);
            }
        });
    }
    remplir_LeTableau();

    // Supprimer Employe
    $(document).on('click', '.Supprimer', function (e) {
        e.preventDefault(); // Empêcher l'action par défaut du lien
        var id = $(this).attr('id').replace('SupprimerEmploye_', ''); // Récupérer l'ID des données à supprimer

        if (confirm('Êtes-vous sûr de vouloir supprimer ces données?')) {
            // Envoyer la requête AJAX pour supprimer les données
            $.ajax({
                url: './includes/supprimerEmploye.php', // L'URL du script PHP qui a supprimé les données
                type: 'post',
                data: { id: id },
                success: function (response) {
                    // Si la suppression a réussi, supprimez la ligne du tableau
                    if (response == 'success') {
                        $('#SupprimerEmploye_' + id).closest('tr').remove();
                    } else {
                        alert('Erreur lors de la suppression des données.');
                    }
                }
            });
        }
    });

    // BTN modifier donnee Employe
    $(document).on('click', '.modifier', function (e) {
        e.preventDefault(); // Empêcher l'action par défaut du lien
        var id = $(this).attr('id').replace('modifierEmploye_', ''); // Récupérer l'ID des données à modifier
        // Enregistrez l'ID dans localStorage
        localStorage.setItem('employeID', id);
        // ou si vous disposez déjà des données disponibles dans le client, vous pouvez ignorer la requête AJAX
        $.ajax({
            url: './includes/trouverEmploye.php',
            type: 'get',
            data: { id: id },
            dataType: 'json',
            success: function (response) {
                // Remplissez les champs du formulaire avec les données de l'employé
                $('#modifierPhoto').val(response.photo);
                $('#modifierNom').val(response.nom);
                $('#modifierSalaire').val(response.salaire);
                $('#modifierVille').val(response.ville);
                // Ouvrez le modal
                $('#formModalModifierEmploye').modal('show');
            }
        });
    });
</script>
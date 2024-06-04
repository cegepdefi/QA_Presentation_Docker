<!-- Modal -->
<div class="modal fade" id="formAjouterEmploye" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Ajouter un employé</h5>
                <button type="button" id="btn_fermerModalAjouterEmploye" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario -->
                <form id="formCreerEmploye">
                    <div class="form-group">
                        <label for="linkphoto">Link photo</label>
                        <input type="url" name="linkphoto" class="form-control" id="linkphoto"
                            placeholder="Entrez l'URL de la photo">
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom"
                            placeholder="Écrivez le nom de l'employé">
                    </div>
                    <div class="form-group">
                        <label for="salaire">Salaire</label>
                        <input type="number" name="salaire" class="form-control" id="salaire"
                            placeholder="Écrivez le salaire de l'employé"
                            onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    </div>
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <select name="ville" class="form-control" id="ville">
                            <option value="">Sélectionnez une ville</option>
                            <option value="montreal" id="montreal">Montreal</option>
                            <option value="quebec" id="quebec">Quebec</option>
                            <option value="toronto" id="toronto">Toronto</option>
                            <option value="vancouver" id="vancouver">Vancouver</option>
                        </select>
                    </div>
                    <button type="button" id="btn_fermerAjouterEmploye" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" id="btn_sauvegarderAjouterEmploye" class="btn btn-primary">Ajouter</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#formCreerEmploye').on('submit', function (e) {
            e.preventDefault(); // Empêcher que le formulaire soit soumis de la manière traditionnelle
            var formData = $(this).serialize();
            // console.log('Données de formulaire:', formData); // Imprimer les données sur la console
            $.ajax({
                type: 'POST',
                url: './includes/creerEmploye.php', // L'URL du script PHP qui traitera les données
                data: formData, // Sérialise les données du formulaire
                success: function (response) {
                    // Ici, vous pouvez gérer la réponse du serveur
                    alert('Données envoyées' + response);
                    remplir_LeTableau(); // Mettre à jour le tableau après l'insertion
                }
            });
        });
    });
</script>
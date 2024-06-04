<!-- Modal -->
<div class="modal fade" id="formModalModifierEmploye" tabindex="-1" role="dialog" aria-labelledby="modalLabelModifier"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabelModifier">Modifier un employé</h5>
                <button type="button" id="btn_fermerModalModifierFermer" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario -->
                <form id="formModifierEmploye">
                    <div class="form-group">
                        <label for="modifierPhoto">Link photo</label>
                        <input type="url" name="modifierPhoto" class="form-control" id="modifierPhoto"
                            placeholder="Entrez l'URL de la photo">
                    </div>
                    <div class="form-group">
                        <label for="modifierNom">Nom</label>
                        <input type="text" name="modifierNom" class="form-control" id="modifierNom"
                            placeholder="Écrivez le nom de l'employé">
                    </div>
                    <div class="form-group">
                        <label for="modifierSalaire">Salaire</label>
                        <input type="number" name="modifierSalaire" class="form-control" id="modifierSalaire"
                            placeholder="Écrivez le salaire de l'employé"
                            onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    </div>
                    <div class="form-group">
                        <label for="modifierVille">Ville</label>
                        <select name="modifierVille" class="form-control" id="modifierVille">
                            <option value="">Sélectionnez une ville</option>
                            <option value="montreal">Montreal</option>
                            <option value="quebec">Quebec</option>
                            <option value="toronto">Toronto</option>
                            <option value="vancouver">Vancouver</option>
                        </select>
                    </div>
                    <button type="button" id="btn_fermerModalModifier" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" id="btn_SauvegarderModalModifier" class="btn btn-primary">Modifier</button>
                </form>

            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#formModifierEmploye').on('submit', function (e) {
            e.preventDefault(); // Empêcher que le formulaire soit soumis de la manière traditionnelle
            var id = localStorage.getItem('employeID'); // Récupérer l'ID de localStorage
            var linkphoto = $('#modifierPhoto').val();
            var nom = $('#modifierNom').val();
            var salaire = $('#modifierSalaire').val();
            var ville = $('#modifierVille').val();
            // console.log('Données de formulaire:', formData); // Imprimer les données sur la console
            $.ajax({
                type: 'POST',
                url: './includes/modifierEmploye.php', // L'URL du script PHP qui traitera les données
                data: {
                    id: id,
                    linkphoto: linkphoto,
                    nom: nom,
                    salaire: salaire,
                    ville: ville
                }, // Sérialise les données du formulaire
                success: function (response) {
                    // Ici, vous pouvez gérer la réponse du serveur
                    alert('Données envoyées' + response);
                    // Après avoir enregistré les modifications, supprimez l'ID localStorage
                    localStorage.removeItem('employeID');
                    // Mettre à jour le tableau ou afficher un message si nécessaire
                    $('#formModalModifierEmploye').modal('hide');
                    // Appelez la fonction qui met à jour la table
                    remplir_LeTableau();
                }
            });
        });
    });
</script>
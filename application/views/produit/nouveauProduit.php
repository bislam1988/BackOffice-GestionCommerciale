<script type="text/javascript">
    function ajouter_produit_ajax(){

        var data = {
            libelleProduit : $('#vLibelleProduit').val(),
            descriptionProduit : $('#vDescriptionProduit').val(),
            categorieIdProduit : $('#vCategorieIdProduit').val(),
            ajax : '1',
            type : 'POST',
            url : '<?php echo site_url('produit/ajouterProduit'); ?>'
        };

        $.ajax({
            url: data['url'],
            type: data['type'],
            data: data,
            success: function(msgResultat) {

                if(msgResultat !=1){
                    alert("Erreur lors l'enregistrement du produit");
                }else{
                    alert("Le nouveau produit est ajouté avec succès");
                    window.location.href="/BackOffice-GestionCommerciale/produit/listerProduit";
                }
            }
        });

        return false;
    }
</script>

<div>
    <div style="width: 40%; padding: 5px">
        <form action="" method="post">
        <table style="width: 100%">
            <caption style="text-align: left"><b>Nouveau produit</b></caption>
                    <tr>
                        <td>Libelle :</td>
                        <td><input type="text" style="width: 100%" id="vLibelleProduit"/></td>
                    </tr>
                    <tr>
                        <td>Description :</td>
                        <td><input type="text" style="width: 100%" id="vDescriptionProduit"/></td>
                    </tr>
                    <tr>
                        <td>Catégorie :</td>
                        <td>
                            <select style="width: 100%" id="vCategorieIdProduit">
                                <?php
                                foreach ($categories as $categorie){
                                ?>
                                <option value="<?php echo $categorie['categorieId']; ?>">
                                    <?php echo $categorie['libelleCategorie']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Ajouter" onclick="ajouter_produit_ajax(); return false;" />

                        </td>
                    </tr>
        </table>
        </form>
    </div>
</div>








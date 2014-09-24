<div style="width: 100%">
    <div style="width: 100%; padding: 5px">
        <table style="width: 80%">
            <caption style="text-align: left">Detail ProduitId : <?php echo $infoProduit['produitId']; ?></caption>
            <tr style="text-align: center">
                <th>Libelle</th>
                <th>Description</th>
                <th>Catégorie</th>
                <th>Réference</th>
            </tr>
            <tr style="text-align: center">
                    <td><?php echo $infoProduit['libelleProduit']; ?></td>
                    <td><?php echo $infoProduit['descriptionProduit']; ?></td>
                    <td><?php echo $infoProduit['libelleCategorie']; ?></td>
                    <td><?php echo $infoProduit['referenceCategorie']; ?></td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="4"><a href='<?php echo site_url("produit/listerProduit"); ?>'>[ Liste des produits ]</a></td>
            </tr>
        </table>
    </div>
</div>

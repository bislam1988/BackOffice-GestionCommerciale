<div>
    <div style="width: 50%; padding: 5px">
        <table style="width: 100%">
            <caption style="text-align: left">
                Produit(s) : <?php echo $nbreProduit;?>
                <a href='<?php echo site_url("produit/nouveauProduit"); ?>'>[Nouveau produit]</a>
            </caption>
            <?php
            foreach ($produits as $produit){
                ?>
                    <tr>
                        <td><?php echo $produit['id']; ?></td>
                        <td><?php echo $produit['libelle']; ?></td>
                        <td><?php echo $produit['description']; ?></td>
                        <td><a href='<?php echo site_url("produit/detailProduit/" . $produit['id']); ?>'>Detail</a></td>
                    </tr>
            <?php } ?>
        </table>
    </div>
</div>

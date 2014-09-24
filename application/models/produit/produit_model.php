<?php
/**
 * Created by PhpStorm.
 * User: abdeslem BELMOKADDEM
 * Date: 21/09/14
 * Time: 22:16
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produit_model extends CI_Model
{
    protected $tb_produit = 'GC_Produit';
    protected $tb_categorie= 'GC_Categorie';

    /**
     * Permet de compter le nombre de produit
     * @return nombre total des produits
     */
    public function countAllProduit()
    {
        $requette = "select id from " . $this->tb_produit;
        $query = $this->db->query($requette);
        return $query->num_rows() ;
    }

    /**
     * Permet de lister les produits
     * @return La liste des produits
     */
    public function getAllProduit()
    {
        $requette = "select id, libelle, description from " . $this->tb_produit;
        $query = $this->db->query($requette);
        return $query;
    }

    /**
     * Permet de récupèrer le détail du produit (catégorie)
     * @param $produitId : l'identifiant du produit
     * @return Le détail du produit
     */
    public function getDetailProduit($produitId)
    {
        $requette = "select p.id as produitId, p.libelle as libelleProduit,
        p.description as descriptionProduit, c.libelle as libelleCategorie,
        c.reference as referenceCategorie
        FROM " .$this->tb_produit . " as p
        JOIN ". $this->tb_categorie . " as c on c.id = p.categorieId
        WHERE p.id = " . $produitId;
        $query = $this->db->query($requette);
        return $query;
    }

    /**
     * Permet d'enregistrement un nouveau produit
     * @param $libelleProduit
     * @param $descriptionProduit
     * @param $categorieIdProduit
     * @return
     */
    public function enregistrerProduit($libelleProduit, $descriptionProduit, $categorieIdProduit)
    {
        $requette = "insert into " . $this->tb_produit . " (libelle, description, categorieId)
        values  ('" . $libelleProduit. "', '" . $descriptionProduit ."', " . $categorieIdProduit .")";
        $query = $this->db->query($requette);
        return $query;
    }

    /**
     * Permet de supprimer un produit
     * @param $produitId
     * @return
     */
    public function supprimerProduit($produitId)
    {
        $requette = "delete FROM " .$this->tb_produit . "
        where id = " . $produitId;
        $query = $this->db->query($requette);
        return $query;
    }

}

?>
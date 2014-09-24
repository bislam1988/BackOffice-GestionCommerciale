<?php
/**
 * Created by PhpStorm.
 * User: abdeslem BELMOKADDEM
 * Date: 23/09/14
 * Time: 22:48
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorie_model extends CI_Model
{
    protected $tb_produit = 'GC_Produit';
    protected $tb_categorie= 'GC_Categorie';

    /**
     * Permet de compter le nombre de catégorie
     * @return nombre total des catégories
     */
    public function countAllCategorie()
    {
        $requette = "select id from " . $this->tb_categorie;
        $query = $this->db->query($requette);
        return $query->num_rows() ;
    }

    /**
     * Permet de lister les catégories
     * @return La liste des catégories
     */
    public function getAllCategorie()
    {
        $requette = "select c.id as categorieId, c.libelle as libelleCategorie, c.reference as referenceCategorie from " . $this->tb_categorie . " as c";
        $query = $this->db->query($requette);
        return $query;
    }

    /**
     * Permet de récupèrer le détail de la catégorie
     * @param $produitId : l'identifiant du catégorie
     * @return Le détail du catégorie
     */
    public function getDetailCategorie($categorieId)
    {
        $requette = "select c.id as categorieId, c.libelle as libelleCategorie, c.reference as referenceCategorie
        FROM " .$this->tb_categorie . " as c
        WHERE c.id = " . $categorieId;
        $query = $this->db->query($requette);
        return $query;
    }
}


?>
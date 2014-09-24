<?php
/**
 * Created by PhpStorm.
 * User: abdeslem BELMOKADDEM
 * Date: 21/09/14
 * Time: 22:10
 */
class Produit extends CI_Controller
{
    const NB_PRODUIT_PAR_PAGE = 3;

    /**
     * Constructeur pad défaut
     */
    public function __construct()
    {
        //	Obligatoire
        parent::__construct();
        $this->load->database();
        $this->load->model('produit/Produit_model', 'produitManager');
        $this->load->model('produit/Categorie_model', 'categorieManager');
        $this->load->library('layout');
    }

    /**
     * Permet de lister tout les produits
     */
    public function listerProduit()
    {
        //Header
        $this->headerPage();
        $this->layout->setTitre('Gestion Commerciale | Liste Produit');
        // On récupère les données
        $data = array();
        $data['nbreProduit'] = $this->produitManager->countAllProduit();
        $data['produits']= $this->produitManager->getAllProduit()->result_array();

        $this->layout->views('produit/header',$data);
        $this->layout->views('produit/centerIndex',$data);
        //footer
        $this->footerPage();
    }

    /**
     * Permet de détailler un produit (catégorie)
     * @param $produitId
     */
    public function detailProduit($produitId)
    {
        //Header
        $this->headerPage();
        $this->layout->setTitre('Gestion Commerciale | Détail Produit');
        // On récupère les données
        $data = array();
        $data['infoProduit']= $this->produitManager->getDetailProduit($produitId)->row_array();

        $this->layout->views('produit/header',$data);
        $this->layout->views('produit/centerDetailProduit',$data);
        //footer
        $this->footerPage();
    }

    /**
     * Permet de créer un nouveau produit (formulaire)
     */
    public function nouveauProduit()
    {
        //Header
        $this->headerPage();
        $this->layout->setTitre('Gestion Commerciale | Nouveau Produit');
        // On récupère les données
        $data = array();
        $data['categories']= $this->categorieManager->getAllCategorie()->result_array();

        $this->layout->views('produit/header');
        $this->layout->views('produit/nouveauProduit',$data);
        //footer
        $this->footerPage();
    }

    /**
     * Traitement AJAX
     * Permet d'ajouter un nouveau produit
     */
    public function ajouterProduit()
    {
        // On charge le librairie de form_validation
        $this->load->library('form_validation');

        if($this->input->post('ajax') == '1'){

            // On vérifie les données
            $this->form_validation->set_rules('libelleProduit', 'libelle produit', 'trim|required|xss_clean');
            $this->form_validation->set_rules('descriptionProduit', ' description produit', 'trim|required|xss_clean');
            $this->form_validation->set_rules('categorieIdProduit', 'CategorieId produit', 'trim|required|xss_clean');

            if($this->form_validation->run() == FALSE){
                $msgResultat = explode('<p>',validation_errors());
                return;
            }else{
                // On récupère les données
                $libelleProduit = $this->input->post('libelleProduit');
                $descriptionProduit = $this->input->post('descriptionProduit');
                $categorieIdProduit = $this->input->post('categorieIdProduit');
                // On enregistre le produit
                $this->produitManager->enregistrerProduit($libelleProduit, $descriptionProduit, $categorieIdProduit);
                echo 1;
                return;
            }
        }else{
            echo "Probleme ajax : enregistrer Produit";
            return;
        }
    }


    /**
     * Permet d'ajouter les différents composants de la page (css, js, theme)
     */
    private function headerPage()
    {
        // Include css
        $this->layout->ajouterCss('style');
        //Include js
        $this->layout->ajouterJs('jquery.min');
        $this->layout->ajouterJs('jquery');
        $this->layout->ajouterJs('slides.min.jquery');
        // on charge le theme
        $this->layout->setTheme('defaut');
    }

    /**
     * Permet d'appel la view du footer de la pge
     */
    private function FooterPage()
    {
        $this->layout->view('produit/footer');

    }

}
?>
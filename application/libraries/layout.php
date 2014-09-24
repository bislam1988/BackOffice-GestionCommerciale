<?php
/**
 * Created by PhpStorm.
 * User: abdeslem
 * Date: 21/09/14
 * Time: 22:16
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	private $CI;
	private $var = array();
	
	private $theme = 'default';
	
/*
|===============================================================================
| Constructeur
|===============================================================================
*/
	
	public function __construct()
	{
		$this->CI = get_instance();
		
		$this->var['output'] = '';

		//	Le titre est composé du nom de la méthode et du nom du contrôleur
		//	La fonction ucfirst permet d'ajouter une majuscule
		$this->var['titre'] = ucfirst($this->CI->router->fetch_method()) . ' - ' . ucfirst($this->CI->router->fetch_class());
	
		//	Nous initialisons la variable $charset avec la même valeur que
		//	la clé de configuration initialisée dans le fichier config.php
		$this->var['charset'] = $this->CI->config->item('charset');
		
		$this->var['css'] = array();
		$this->var['js'] = array();

	}
	
/*
|===============================================================================
| Méthodes pour charger les vues
|	. view
|	. views
|===============================================================================
*/
	
	public function view($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		
		$this->CI->load->view('../themes/' . $this->theme, $this->var);
	}
	
	public function views($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		return $this;
	}
	
	/*
	|===============================================================================
	| Méthodes pour modifier les variables envoyées au layout
	|	. set_titre	
	|	. set_charset
	|===============================================================================
	*/

	public function setTitre($titre)
	{
		//%20 ==> espace, %C3%A9 ==> é etc............
		$chaine_UTF_8 = array('%20','%27','%22','%C3%BB','%C3%BA','%C3%B9','%C3%B4','%C3%AE','%C3%AA','%C3%A8','%C3%A7','%C3%A2','%C3%A1','%C3%A0','%C3%A9','%C2%A3','%C2%A4','%C2%A5','%C2%A9','%C2%B0','%C2%B5','%C2%B7');
		$chaine_caracter = array(' ','\'','"','û','ú','ù','ô','î','ê','è','ç','â','á','à','é','£','¤','¥','©','°','µ','·');
		
		if(is_string($titre) AND !empty($titre))
		{
			$this->var['titre'] = str_replace($chaine_UTF_8,$chaine_caracter, $titre);
			return true;
		}
		return false;
	}

	public function setCharset($charset)
	{
		if(is_string($charset) AND !empty($charset))
		{
			$this->var['charset'] = $charset;
			return true;
		}
		return false;
	}
	
	/*
	|===============================================================================
	| Méthodes pour modifier le thème		
	|	. 
	|	. 
	|===============================================================================
	*/
	public function setTheme($theme)
	{	
		if(is_string($theme) AND !empty($theme) AND file_exists('./application/themes/' . $theme . '.php'))
		{
			$this->theme = $theme;
			return true;
		}
		return false;
	}
	
	
	/*
	|===============================================================================
	| Méthodes pour ajouter des feuilles de CSS et de JavaScript		
	|	. ajouter_css
	|	. ajouter_js
	|===============================================================================
	*/
	public function ajouterCss($nom)
	{
		if(is_string($nom) AND !empty($nom) AND file_exists('./assets/css/' . $nom . '.css'))
		{
			$this->var['css'][] = css_url($nom);
			return true;
		}
		return false;
	}

	public function ajouterJs($nom)
	{
		if(is_string($nom) AND !empty($nom) AND file_exists('./assets/javascript/' . $nom . '.js'))
		{
			$this->var['js'][] = js_url($nom);
			return true;
		}
		return false;
	}
	
}

?>
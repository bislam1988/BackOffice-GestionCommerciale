<?php
/**
 * Created by PhpStorm.
 * User: abdeslem
 * Date: 21/09/14
 * Time: 22:16
 */
//la constante BASEPATH est définie. En fait, elle est créée au tout début du fichier index.php.
// En faisant cela, vous serez assurés que le script ne sera pas exécuté depuis l'URL, mais bien en suivant l'ordre normal des chose
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('url'))
{
	function url($alt, $nom)
	{
		return '<a href="'.base_url() . '' . $nom . '">'.$alt.'</a>';
	}
}


if ( ! function_exists('css_url'))
{
	function css_url($nom)
	{
		return base_url() . 'assets/css/' . $nom . '.css';
	}
}

if ( ! function_exists('js_url'))
{
	function js_url($nom)
	{
		return base_url() . 'assets/javascript/' . $nom . '.js';
	}
}

if ( ! function_exists('img_url'))
{
	function img_url($nom)
	{
		return base_url() . 'assets/images/' . $nom;
	}
}

if ( ! function_exists('swf_url'))
{
	function swf_url($nom)
	{
		return base_url() . 'assets/swf/' . $nom . '.swf';
	}
}


if ( ! function_exists('img_url_articleDB'))
{
	function img_url_articleDB($nom)
	{
		return base_url() .''. $nom;
	}
}

if ( ! function_exists('img_url_profilDB'))
{
	function img_url_profilDB($nom)
	{
		return base_url() .''. $nom;
	}
}


if ( ! function_exists('img'))
{
	function img($nom, $alt = '')
	{
		return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
	}
}



if ( ! function_exists('convert_date'))
{
	function convertir_date($date)
	{
		$yy = substr($date,0,4);
		$mm = substr($date,5,2);
		$dd = substr($date,8,2);

		$hh = substr($date,11,2);
		$min = substr($date,14,2);


		$mois = array('01'=>'Janvier',
					  '02'=>'F&eacute;vrier',
					  '03'=>'Mars',
					  '04'=>'Avril',
					  '05'=>'Mai',
					  '06'=>'Juin',
					  '07'=>'Juillet',
					  '08'=>'Ao&ucirc;t',
					  '09'=>'Septembre',
					  '10'=>'Novembre',
					  '11'=>'Octobre',
					  '12'=>'D&eacute;cembre');

		$new_date = $dd." ".$mois[$mm]." ".$yy." | ".$hh."h".$min;  

	  	return $new_date;
	}
}


if ( ! function_exists('UTF_8_to_character'))
{
	function UTF_8_to_character($la_chaine)
	{
		$chaine_UTF_8 = array('%20','%27','%22','%C3%BB','%C3%BA','%C3%B9','%C3%B4','%C3%AE','%C3%AA','%C3%A8','%C3%A7','%C3%A2','%C3%A1','%C3%A0','%C3%A9','%C2%A3','%C2%A4','%C2%A5','%C2%A9','%C2%B0','%C2%B5','%C2%B7','%E9');
		
		$chaine_caracter = array(' ','\'','"','û','ú','ù','ô','î','ê','è','ç','â','á','à','é','£','¤','¥','©','°','µ','·','é');
		
		if(is_string($la_chaine) AND !empty($la_chaine))
		
			return str_replace($chaine_UTF_8,$chaine_caracter, $la_chaine);
		


	}
}
		
?>
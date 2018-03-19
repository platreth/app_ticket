<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MainController extends Controller
{
	/**
	* @Route("/", name="app_home")
	* @Template("main/home.html.twig")
	*/
	public function homeAction()
	{
		return ["projetct_name" => "Accueil"];
	}
}
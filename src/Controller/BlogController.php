<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; //add this line to add usage of Route class.

class BlogController extends Controller
{
	const BD = array(
         		"article1" => array(
           	    "title" => "les singes",
           	    "content" => "<h1>Le singes</h1>
           	    			<p>khzifhigjzeogjozjgozjgozjgozjkgozjrgojzeogjorzejgekljrgoejroejgoejrogjeogjobjreojreojboejbotdjohjohjdohrjophrjklhbdthjeoidfkljjirjioerjih</p>"
         ),
         		"article2" => array(
           	    "title" => "les fourmis",
           	    "content" => "<h1>Les fourmis</h1>
           	    			<p>khzifhigjzeogjozjgozjgozjgozjkgozjrgojzeogjorzejgekljrgoejroejgoejrogjeogjobjreojreojboejbotdjohjohjdohrjophrjklhbdthjeoidfkljjirjioerjih</p>"
         )
    );
	    /**
     * @Route("/blog/", name="blog")
     * @Route ("/blog/{name_blog}", name="blog_name")
     */
   public function blogAction()
    {
        return $this->render("main/blog.html.twig", ["tableau" => self::BD]);
        
    }

    public function show()
    {
    	 return $this->render("main/show.html.twig");
    }

}
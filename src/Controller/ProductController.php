<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; //add this line to add usage of Route class.
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Product;



/**
 * @Route("/product")
 */


class ProductController extends Controller
{
/**
 * @Route("/add", name="product.add")
 * @Template("product/add.html.twig")

 */

  public function add(Request $request)  
  {
$product = new Product();
$form = $this->createFormBuilder($product)
    ->add("name", TextType::class)
    ->add("releaseOn", DateType::class, [
        "widget" => "single_text"
    ])
    ->add("save", SubmitType::class, ["label" => "create Product"])
    ->getForm();
$form->handleRequest($request);
if ($form->isSubmitted() && $form->isValid()) {
    $em = $this->getDoctrine()->getManager();

    $em->persist($product);
    $em->flush();
    return $this->redirectToRoute("product.all");

}

return ["form" => $form->createView()];

  }

  /**
 * @Route("/all", name="product.all")
 * @Template("product/all.html.twig")

 */
public function all()  
{

 $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository(Product::class)->findAll();
        return ["products" => $products];
}


  /**
 * @Route("/show/{product}", name="product.show")
 * @Template("product/show.html.twig")

 */
public function show(Product $product)  
{
return ["product"=>$product];

}

  /**
 * @Route("/delete/{product}", name="product.delete")
 * @Template("product/delete.html.twig")

 */
public function delete(Product $product)  
{
$em = $this->getDoctrine()->getManager();
$em->remove($product);
$em->flush();
return $this->redirectToRoute('product.all');

}
	  /**
	 * @Route("/update/{product}", name="product.update")
	 * @Template("product/update.html.twig")

	 */
	public function update(Product $product, Request $request)  
	{
	$form = $this->createFormBuilder($product)
	    ->add("name", TextType::class)
	    ->add("releaseOn", DateType::class, [
	        "widget" => "single_text"
	    ])
	    ->add("save", SubmitType::class, ["label" => "Update Product"])
	    ->getForm();
	$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
		    $em = $this->getDoctrine()->getManager();

		    $em->persist($product);
		    $em->flush();
		    return $this->redirectToRoute("product.all");

		}
			return ["form"=>$form->createView()];

	}
}

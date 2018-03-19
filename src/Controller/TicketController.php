<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; //add this line to add usage of Route class.
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Ticket;

/**
 * @Route("/ticket")
 */


class TicketController extends Controller
{
/**
 * @Route("/add", name="ticket.add")
 * @Template("ticket/add.html.twig")

 */

  public function add(Request $request)  
  {
$ticket = new Ticket();
$form = $this->createFormBuilder($ticket)
    ->add("title", TextType::class)
   	->add("description", TextareaType::class)
    ->add("save", SubmitType::class, ["label" => "Créer le ticket"])
    ->getForm();
$form->handleRequest($request);
if ($form->isSubmitted() && $form->isValid()) {
    $em = $this->getDoctrine()->getManager();

    $em->persist($ticket);
    $em->flush();
    return $this->redirectToRoute("ticket.all");

}

return ["form" => $form->createView()];

  }

  /**
 * @Route("/all", name="ticket.all")
 * @Template("ticket/all.html.twig")

 */
public function all()  
{

 $em = $this->getDoctrine()->getManager();
        $tickets = $em->getRepository(Ticket::class)->findAll();
        return ["tickets" => $tickets];
}


  /**
 * @Route("/show/{ticket}", name="ticket.show")
 * @Template("ticket/show.html.twig")

 */
public function show(Ticket $ticket)  
{
return ["ticket"=>$ticket];

}

  /**
 * @Route("/delete/{ticket}", name="ticket.delete")
 * @Template("ticket/delete.html.twig")

 */
public function delete(Ticket $ticket)  
{
$em = $this->getDoctrine()->getManager();
$em->remove($ticket);
$em->flush();
return $this->redirectToRoute('ticket.all');

}
	  /**
	 * @Route("/update/{ticket}", name="ticket.update")
	 * @Template("ticket/update.html.twig")

	 */
	public function update(Ticket $ticket, Request $request)  
	{
	$form = $this->createFormBuilder($ticket)
	    ->add("title", TextType::class)
	    ->add("releaseOn", DateType::class, [
	        "widget" => "single_text"
	    ])
	    ->add("save", SubmitType::class, ["label" => "Mettre à jour le ticket"])
	    ->getForm();
	$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
		    $em = $this->getDoctrine()->getManager();

		    $em->persist($ticket);
		    $em->flush();
		    return $this->redirectToRoute("ticket.all");

		}
			return ["form"=>$form->createView()];

	}
}
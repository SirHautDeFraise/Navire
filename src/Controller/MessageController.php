<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\GestionContact;

/**
 * @Route("/message/", name="message_")
 */
class MessageController extends AbstractController {

  public function index(): Response {
    return $this->render('message/index.html.twig', [
                'controller_name' => 'MessageController',
    ]);
  }

  /**
   * @Route("contact", name="messagecontact")
   */
  public function Formulaire(Request $request, GestionContact $gestionContact): Response {
    $message = new Message();

    $form = $this->createForm(MessageType::class, $message);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $message = $form->getData();

      $gestionContact->envoiMailContact($message);


      return $this->redirectToRoute("home");
    }

    return $this->render('message/contact.hmtl.twig', [
                'form' => $form->createView(),
    ]);
  }

}

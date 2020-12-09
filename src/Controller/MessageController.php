<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
  public function Formulaire(): Response {
    
  }

}

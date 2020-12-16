<?php
// src/service/gestionContact.php
namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Twig\Environment;
use Doctrine\Persistence\ManagerRegistry;
use \Mailjet\Resources;
//use \Mailjet\Client;
use App\Entity\Message;

/**
 * Description of GestionContact
 *
 * @author Benoît
 */
class GestionContact
{

//documentation : https://swiftmailer.symfony.com/docs/sending.html
  function __construct()
  {
    
  }

  public static function envoiMailContact(Message $message)
  {
    $mj = new \Mailjet\Client('b9db8d259d359ad10412b99084c89054', '0e8aeeacaa0512455828d76ee9562b56', true, ['version' => 'v3.1']);
    $body = [
      'Messages' => [
        [
          'From' => [
            'Email' => "lukedussart@hotmail.fr",
            'Name' => "Luke"
          ],
          'To' => [
            [
              'Email' => $message->getMail(),
              'Name' => "Luke"
            ]
          ],
          'Subject' => "Greetings from Mailjet.",
          'TextPart' => "My first Mailjet email",
          'HTMLPart' => "<h3>". $message->getMessage() ."</h3>",
          'CustomID' => "AppGettingStartedTest"
        ]
      ]
    ];
    $response = $mj->post(Resources::$Email, ['body' => $body]);
    $response->success() && var_dump($response->getData());

    $coucou = 0;
  }

  public static function EnregistrerMessage(Message $message): void
  {
    $em = $this->doctrine->getManager();
    $em->persist($message);
    $em->flush();
  }
}

/*$email = (new \Swift_Message('Demande de renseignement'))
      ->setFrom([$message->getMail() => 'Nouvelle demande'])
      ->setTo('lukedussart@hotmail.fr');
    $email->setBody(
      $this->environnementTwig->render(
        'mail/mail.html.twig',
        ['message' => $message]
      ),
      'text/html'
    );
    
    $email->attach(\Swift_Attachment::fromPath('documents/document.pdf'));
    $this->mail->send($email);
     */
  
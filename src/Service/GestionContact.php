<?php


namespace App\Service;

use App\Entity\Contact;
use Twig\Environment;
use Doctrine\Persistence\ManagerRegistry ;
use App\Repository\MessageRepository;
/**
 * Description of GestionContact
 *
 * @author Benoît
 */
class GestionContact {
//documentation : https://swiftmailer.symfony.com/docs/sending.html
    private \Swift_Mailer $mail;
    private Environment $environnementTwig;
    private ManagerRegistry $doctrine;
    private MessageRepository $repo;

    function __construct(\Swift_Mailer $mail, Environment $environnementTwig, ManagerRegistry $doctrine, MessageRepository $repo) {
        $this->mail = $mail;
        $this->environnementTwig = $environnementTwig;
        $this->doctrine=$doctrine;
        $this->repo=$repo;
    }

    public function envoiMailContact(Contact $message) {
        //$titre = ($contact->getTitre() == 'M') ? ('Monsieur') : ('Madame');
        $email = (new \Swift_Message('Demande de renseignement'))
                -setFrom([$message->getMail()=>'Nouvelle demande'])
                //->setFrom(['contact@benoitroche.fr'=> 'Benoît Roche Symfony'])
                ->setTo(['laudethibault83@gmail.com'=> 'Thibault Laude Symfony']);
           //$img=  $email->embed(\Swift_Image::fromPath('build/images/symfony.png'));
           $email->setBody(
                        $this->environnementTwig->render(
                                // templates/emails/registration.html.twig
                                'mail/mail.html.twig',
                                ['message' => $message]
                        ),
                        'text/html'
                );
            $email->attach(\Swift_Attachment::fromPath('documents/presentation.pdf'));
        $this->mail->send($email);
    }  
}



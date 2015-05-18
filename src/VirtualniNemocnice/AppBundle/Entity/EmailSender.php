<?php

namespace VirtualniNemocnice\AppBundle\Entity;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

class Email implements LoggerAwareInterface
{
    use LoggerAwareTrait;
    /** @var LoggerInterface */
    protected $log;
    /** @var \Swift_Mailer */
    protected $mailer;
    /** @var \Twig_Environment */
    protected $engine;
    private $container;


    public function __construct(
        \Swift_Mailer $mailer,
        \Twig_Environment $engine,
        ContainerInterface $container
    )
    {
        $this->mailer = $mailer;
        $this->engine = $engine;
        $this->container = $container;


    }

    /**
     * @param Patient $patient
     */
    public function sendConfirmationToUser(Patient $patient)
    {
        $token = hash('md5', $this->container->getParameter('secret') . $patient->getEmail());
        $router = $this->container->get('router');;
        $questionDetail = $router->generate('detailQuestion',
            ['email' => $patient->getEmail(), 'token' => $token]
        );

        /** @var \Swift_Message $message */
        $message = \Swift_Message::newInstance()
            ->setSubject('Nový dotaz')
            ->setFrom('noreply@virtualninemocnice.cz')
            ->setTo($patient->getEmail())
            ->setBody(
                $this->engine->render(
                    'VirtualniNemocniceAppBundle:Email:emailToPatient.html.twig',
                    ['patient' => $patient, 'questionDetail' => $questionDetail]
                ),
                'text/html'
            );

        try {
            $this->container->get('mailer')->send($message);
            $this->logger->info('Email sent to user email: '.$patient->getEmail());
        } catch (\Exception $e) {
            $this->logger->error('Email not sent to user email: '.$patient->getEmail() . ', ' .
                $e->getMessage());
        }
    }
}
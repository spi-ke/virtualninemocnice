<?php

namespace VirtualniNemocnice\AppBundle\Entity;

use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Log\LoggerInterface;
use Symfony\Component\Routing\Router;

class Email
{

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

        $message = \Swift_Message::newInstance()
            ->setSubject('Nový dotaz')
            ->setFrom('noreply@virtualninemocnice.cz')
            ->setTo($patient->getEmail())
            ->setBody(
                $this->engine->render(
                    'VirtualniNemocniceAppBundle:Email:emailToPatient.html.twig',
                    ['patient' => $patient, 'questionDetail' => $questionDetail]
                )
            );

        $this->container->get('mailer')->send($message);
    }
}
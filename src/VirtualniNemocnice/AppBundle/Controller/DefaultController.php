<?php

namespace VirtualniNemocnice\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @param $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="home")
     * @Template
     */
    public function indexAction(Request $request)
    {

        $patients = $this->get('patient.repository')->findAllPatientQuestions();

        return [
            'patients' => $patients
        ];
    }
}

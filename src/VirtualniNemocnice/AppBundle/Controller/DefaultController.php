<?php

namespace VirtualniNemocnice\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use VirtualniNemocnice\AppBundle\Entity\Patient;

class DefaultController extends Controller
{
    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/{name}", name="home", defaults={"name" = "World"})
     * @Template
     */
    public function indexAction($name)
    {
        return [
            'name' => $name
        ];
    }

    /**
     * Question form Action
     *
     * @Route("/poradna/dotaz", name="createQuestion")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     * @Template
     */
    public function createQuestionAction()
    {
        $formData = new Patient(); // Your form data class. Has to be an object, won't work properly with an array.

        $flow = $this->get('app.form.flow.createQuestion'); // must match the flow's service id
        $flow->bind($formData);

        // form of the current step
        $form = $flow->createForm();
        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData($form);

            if ($flow->nextStep()) {
                // form for the next step
                $form = $flow->createForm();
            } else {
                // flow finished
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($formData);
//                $em->flush();

                $flow->reset(); // remove step data from the session

                return $this->redirect($this->generateUrl('home')); // redirect when done
            }
        }

        return [
            'form' => $form->createView(),
            'flow' => $flow,
        ];
    }
}

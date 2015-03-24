<?php

namespace VirtualniNemocnice\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use VirtualniNemocnice\AppBundle\Entity\Patient;

class QuestionController extends Controller
{

    /**
     * Question form Action
     *
     * @Route("/poradna/dotaz/novy", name="createQuestion")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     * @Template
     */
    public function createAction()
    {
        $formData = new Patient(); // Your form data class. Has to be an object, won't work properly with an array.

        $flow = $this->get('app.form.flow.createQuestion'); // must match the flow's service id
        $flow->bind($formData);
//        $flow->setGenericFormOptions(array('method' => 'GET'));
        // form of the current step
        $form = $flow->createForm();
        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData($form);

            if ($flow->nextStep()) {
                // form for the next step
                $form = $flow->createForm();
            } else {
                // flow finished
                $this->get('patient.repository')->storePatient($formData);
                $flow->reset(); // remove step data from the session

                // success message
                $flash = $this->get('braincrafted_bootstrap.flash');
                $flash->success('Děkujeme za vytvoření dotazu, byl vám odeslán informační email.');

                return $this->redirect($this->generateUrl('home')); // redirect when done
            }
        }

        return [
            'form' => $form->createView(),
            'flow' => $flow,
        ];
    }

    /**
     * Question form Action
     *
     * @Route("/poradna/dotaz", name="detailQuestion")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     * @Template
     */
    public function detailAction(Request $request)
    {

    }
}
<?php

namespace VirtualniNemocnice\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/{name}", name="homeWithParam", defaults={"name" = "World"})
     * @Template
     */
    public function indexAction($name)
    {
        return [
            'name' => $name
        ];
    }
}

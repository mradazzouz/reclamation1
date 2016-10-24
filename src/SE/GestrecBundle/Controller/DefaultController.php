<?php

namespace SE\GestrecBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SEGestrecBundle:Default:index.html.twig');
    }
}

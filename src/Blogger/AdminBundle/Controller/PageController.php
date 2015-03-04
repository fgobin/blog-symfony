<?php

namespace Blogger\AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PageController extends Controller
{

    /**
     * @Route("/")
     * @Route("/index", name="BloggerAdminBundle_page_homepage")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        return $this->render('BloggerAdminBundle:Page:index.html.twig');
    }


}

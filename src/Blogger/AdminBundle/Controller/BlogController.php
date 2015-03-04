<?php

namespace Blogger\AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogController extends Controller
{
    /**
     * @Route("showBlogs", name="BloggerAdminBundle_blog_showBlogs")
     * @Method({"GET"})
     */
    public function showBlogsAction()
    {
        return $this->render("BloggerAdminBundle:Blog:showBlogs.html.twig");
    }
}

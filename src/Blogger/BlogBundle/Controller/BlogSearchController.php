<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogSearchController extends Controller
{
    public function searchAction($query)
    {
        $finder = $this->container->get('fos_elastica.index.app.blog');

        $results = $finder->search($query);

        return $this->render('BloggerBlogBundle:BlogSearch:search.html.twig', array(
                'blogs' => $results
        ));
    }

}

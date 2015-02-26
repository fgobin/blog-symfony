<?php

namespace Blogger\BlogBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends  Controller{

    public function showAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        if (!$blog) {
            //TODO: better 404 or redirect!!!!
            throw $this->createNotFoundException('Unable to find Blog post.');
        }
        //TODO: find next entry and previous...

        //return blog post, next and previous blog
        return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
            'previousBlog' => 1,
            'nextBlog' => 2
        ));
    }
}
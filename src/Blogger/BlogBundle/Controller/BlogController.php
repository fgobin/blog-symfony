<?php

namespace Blogger\BlogBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends  Controller{

    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);

        if (!$blog) {
            //TODO: better 404 or redirect!!!!
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $comments = $em->getRepository('BloggerBlogBundle:Comment')
                        ->getCommentsForBlog($blog->getId());

        $previousBlog = $em->getRepository('BloggerBlogBundle:Blog')->getPreviousBlog($id);
        $nextBlog = $em->getRepository('BloggerBlogBundle:Blog')->getNextBlog($id);

        //return blog post, next and previous blog
        return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
            'comments' => $comments,
            'previousBlog' => $previousBlog,
            'nextBlog' => $nextBlog
        ));
    }
}
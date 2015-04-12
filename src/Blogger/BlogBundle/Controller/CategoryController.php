<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Blogger\BlogBundle\Form\CategoryType;


class CategoryController extends Controller
{

    public function showFormAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categoriesEntity = $em->getRepository('BloggerBlogBundle:Category')->findAll();

        $categories = array();
        foreach($categoriesEntity as $cat) {
            array_push($categories,$cat->getName());
        }
        $form = $this->createForm(new CategoryType(), null, array('data' => $categories));

        return $this->render('BloggerBlogBundle:Category:form.html.twig', array(
            'categories' => $categoriesEntity,
            'form' => $form->createView()
        ));

    }

}

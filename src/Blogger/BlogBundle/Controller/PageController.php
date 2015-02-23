<?php


namespace Blogger\BlogBundle\Controller;

use Blogger\BlogBundle\Entity\Enquiry;
use Blogger\BlogBundle\Form\EnquiryType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller {

    public function indexAction() {
        return $this->render('BloggerBlogBundle:Page:index.html.twig');
    }

    public function aboutAction() {
        return $this->render('BloggerBlogBundle:Page:about.html.twig');
    }

    public function contactShowAction() {

        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);
        return $this->render('BloggerBlogBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function contactPostAction(Request $request) {
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);
        $form->handleRequest($request);

        if ($form->isValid()) {
            //TODO: E-mail is not sending via gmail, extract this code to service

            $message = \Swift_Message::newInstance()
                ->setSubject('Contact enquiry from symblog')
                ->setFrom('enquiries@symblog.co.uk')
                ->setTo($this->container->getParameter('blogger_blog.emails.contact_email'))
                ->setBody($this->renderView('BloggerBlogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
            $this->get('mailer')->send($message);

            $request->getSession()->getFlashbag()->add('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');

            // Redirect - This is important to prevent users re-posting the form if they refresh the page
            return $this->redirect($this->generateUrl('BloggerBlogBundle_contactShow'));
        }

        return $this->render('BloggerBlogBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
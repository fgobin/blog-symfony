<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 23.02.15.
 * Time: 13:35
 */

namespace Blogger\BlogBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EnquiryType extends  AbstractType{


    public function  buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('email','email');
        $builder->add('subject');
        $builder->add('body','textarea');
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
       return 'contact';
    }
}
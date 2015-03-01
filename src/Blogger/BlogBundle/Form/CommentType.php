<?php

namespace Blogger\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CommentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author','text')
            ->add('comment','textarea');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'blogger_blogbundle_comment';
    }
}

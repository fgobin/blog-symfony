<?php

namespace Blogger\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('All', 'checkbox', array(
            'attr' => array('value' => 'all'),
            'required' => false
        ));
        $data = $options['data'];
        foreach ($data as $d) {
            $builder->add($d, 'checkbox', array(
                'attr' => array('value' => $d),
                'required' => false
            ));
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'attr' => ['id' => 'category_form'],
            'csrf_protection'   => false,
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'blogger_blogbundle_category';
    }
}

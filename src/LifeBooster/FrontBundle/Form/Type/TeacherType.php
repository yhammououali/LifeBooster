<?php
namespace LifeBooster\FrontBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use LifeBooster\FrontBundle\Entity\Teacher;

class TeacherType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('civility', 'choice', array(
          'label' => 'teacher.civility',
          'required' => true,
          'choices' => Teacher::getCivilities()
        ));
        $builder->add('firstName', null, array(
            'label' => 'teacher.firstName',
            'required' => false,
        ));
        $builder->add('lastName', null, array(
            'label' => 'teacher.lastName',
            'required' => false,
        ));
        $builder->add('email', null, array(
            'label' => 'teacher.email',
            'required' => false,
        ));
        $builder->add('phone', null, array(
            'label' => 'teacher.phone',
            'required' => false,
        ));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LifeBooster\FrontBundle\Entity\Teacher',
        ));
    }

    public function getName()
    {
        return 'teacher';
    }
}
<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints as Assert;

class RememberPasswordType extends AbstractType
{   
 
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', EmailType::class, array(
                        'label' => 'Email',
                        'constraints' => array(
                            new Assert\NotBlank(),
                            new Assert\Email()
                        )
                 ))
                 ->add('save', ButtonType::class, array(
                        'label' => 'Przypomnij hasło'
                 ));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => null,
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'rememberPassword';
    }

}

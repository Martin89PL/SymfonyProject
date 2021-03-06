<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints as Assert;

class RegisterType extends AbstractType
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
                 ->add('username', TextType::class, array(
                     'label' => 'Nick'
                 ))
                 ->add('plainPassword', RepeatedType::class, array(
                        'type' => PasswordType::class,
                        'invalid_message' => 'The password fields must match.',
                        'options' => array('attr' => array('class' => 'password-field')),
                        'required' => true,
                        'first_options'  => array('label' => 'Hasło'),
                        'second_options' => array('label' => 'Powtótrz hasło'),
                 ))
                 ->add('save', SubmitType::class, array(
                        'label' => 'Zarejestruj'
                 ));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\User',
            'validation_groups' => array('Default', 'Registration')
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'userRegister';
    }

}

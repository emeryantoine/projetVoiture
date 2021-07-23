<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',TextType::class, 
            ['label' => 'Prénom',
            'label_attr'=>['class' => 'form-label'], 
            'attr' => ['class' => 'form-control']])
            ->add('lastname',TextType::class, 
            ['label' => 'Nom',
            'label_attr'=>['class' => 'form-label'], 
            'attr' => ['class' => 'form-control']
            ])
            ->add('email', EmailType::class,
            ['label' => 'Email',
            'label_attr'=>['class' => 'form-label'], 
            'attr' => ['class' => 'form-control']])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Mot de passe',
                'mapped' => false,
                'label_attr'=>['class' => 'form-label'],
                'attr' => ['autocomplete' => 'new-password',
                            'class' => 'form-control'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('dateOfBirth',BirthdayType::class,
            ['label' => 'Date de naissance',
            'placeholder' => [
                'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
            ],
            'label_attr'=>['class' => 'form-label'], 
            ])
            ->add('phone', TextType::class,
            ['label' => 'Numéro de téléphone',
            'label_attr'=>['class' => 'form-label'], 
            'attr' => ['class' => 'form-control']])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Conditions générales',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('submit',SubmitType::class,
            [
            'label' => 'Enregistrer',
            'attr' => ['class' => 'btn btn-outline-success']
            ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

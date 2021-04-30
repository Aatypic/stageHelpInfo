<?php

namespace App\Form;

use App\Entity\Modules;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModulesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // j'ajoute un textype a titre dans mon formulaire, j'ai supprimé le add'slug' et commenté le reste. J'ai aussi créer un 'valider' de type submit.
            ->add('titre', TextType::class)
            ->add('nb_pages', NumberType::class)
            //->add('users')
            //->add('quizz')
            ->add('Valider', SubmitType::class)
        ;   
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Modules::class,
        ]);
    }
}

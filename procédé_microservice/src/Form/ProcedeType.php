<?php

namespace App\Form;
use App\Entity\Procede; 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;



class ProcedeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom', TextType::class)
        ->add('description', TextType::class)
        ->add('etapes', TextType::class)
        ->add('description_validation', TextType::class)
        ->add('modele_id', integer::class)
        ->add('save',SubmitType::class,array('label'=>'Save','attr'=>array('class'=>'btn btn-primary m-3')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Entity\Procede',
            'translation_domain'=>'forms'
        ));
    }
}
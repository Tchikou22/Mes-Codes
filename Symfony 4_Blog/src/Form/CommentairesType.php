<?php

namespace App\Form;

use App\Entity\Commentaires;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Componement\Form\Extension\Core\Type\EmailType;
use Symfony\Componement\Form\Extension\Core\Type\CheckboxType;
use symfony\Componement\Form\Extension\Core\Type\SubmitType;

class CommentairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo')
            //EmailType permet de définir le type de champs
            ->add('email', EmailType::class)
            ->add('contenu')
            ->add('rgpd', Checkbox::class, [
                'label' => 'J\'accepte que mes informations soient stockées dans la base de données de Mon Blog pour la gestion des commentaires. J\'ai bien noté qu\'en aucun cas ces données ne seront cédées à des tiers.'
            ])     
            ->add('envoyer', submitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commentaires::class,
        ]);
    }
}

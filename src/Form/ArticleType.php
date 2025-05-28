<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\ArticleCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [
                'label' => 'Titre',
                'attr' => ['class' => 'form-control'],
                'row_attr' => ['class' => 'mb-3 row'],
            ])
            ->add('imageFile',FileType::class, [
                'label' => 'Télécharger la photo',
                'attr' => ['class' => 'form-control'],
            ] )
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
                'attr' => ['class' => 'ckeditor form-control', 'rows' => 5],
                'row_attr' => ['class' => 'mb-3 row'],
            ])
            ->add('seoTitle', TextType::class, [
                'label' => 'SEO Titre',
                'attr' => ['class' => 'form-control'],
                'row_attr' => ['class' => 'mb-3 row'],
            ])
            ->add('seoKeywords', TextType::class, [
                'label' => 'SEO Mots-clés',
                'attr' => ['class' => 'form-control'],
                'row_attr' => ['class' => 'mb-3 row'],
            ])
            ->add('seoDescription', TextareaType::class, [
                'label' => 'SEO Description',
                'required' => false,
                'attr' => ['class' => 'ckeditor form-control', 'rows' => 3],
                'row_attr' => ['class' => 'mb-3 row'],
            ])
            ->add('articleSections', CollectionType::class, [
                'entry_type' => ArticleSectionType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype' => true,
            ])
            ->add('category', EntityType::class, [
                'class' => ArticleCategory::class,
                'choice_label' => 'name',
                'attr' => ['class' => 'form-select'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}

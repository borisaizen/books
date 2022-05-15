<?php

namespace App\Form;

use App\Entity\Books;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BooksType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('BOOK_ID')
            ->add('BOOK_NAME')
            ->add('BOOK_DESCRIPTION')
            ->add('BOOK_PUBLISH_YEAR')
            ->add('BOOK_COVER_FILE_NAME')
            ->add('BOOK_COVER_FILE_CONTENTS')
            ->add('BOOK_AUTHOR_IDS')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Books::class,
        ]);
    }
}

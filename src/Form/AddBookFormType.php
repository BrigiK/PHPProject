<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Author;
use App\Entity\Publisher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\FormEvents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AddBookFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            
            ->add('title')
            ->add('year')
            ->add('nr_of_books', TextType::class, ['label' => "Number of copies"])
            ->add('image')
            ->add('genre')
            ->add('rating')
            ->add('description', TextareaType::class)
            ->add('reviews')
            ->add('nrOfPages', TextType::class, ['label' => "Number of pages"])
            ->add('id_author', EntityType::class, [
                'class' => Author::class,
                'choice_label' => 'name', 
                'multiple' => true,
                'label' => "Authors"])
            ->add('id_publisher', EntityType::class, [
                'class' => Publisher::class,
                // uses the Publisher.title property as the visible option string
                'choice_label' => 'title',
                'multiple' => true,
                'label' => "Publishers"])
            ->add('addbook', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}

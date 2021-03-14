<?php
namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
   
    public function index(): Response
    {
        $form = $this->createFormBuilder()
        ->setMethod('POST')
        ->setAction('api/convert')
         ->add('marsDateTime', TextType::class, [
            'label'=>'Select a time',
            'attr' => ['class' => 'tinymce'],
            'help' => '  The ZIP/Postal code for your credit card\'s billing address.',
            
            'required'=>true,
        ])
        
        ->add('Convert', SubmitType::class, [
            'validation_groups' => false,
        ])
        ->getForm()
        ;
        return $this->render('home/home.html.twig', ['form'=>$form->createView()]);
    }
}

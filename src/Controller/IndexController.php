<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class IndexController extends AbstractController
{
   /**
    * To Do: return form object
    
    */
    protected function buildForm() 
    {
        $form =  $this->createFormBuilder()
        ->add('marsDateTime', TextType::class, [
            'label'=>'Write a time to convert: ',
            'help' => 'Date is a string with this format: YYY-MM-DD H24:MM:SS || Sample: 2021-02-03 14:00:12',
            'required'=>true,
        ])
        
        ->add('Convert', SubmitType::class, [
            'validation_groups' => false,
        ])
        ->getForm()
        ;
        return $form;
    }

    public function index(): Response
    {
        $form =  $this->buildForm();
        return $this->render('home/home.html.twig', ['form'=>$form->createView()]);
    }
}

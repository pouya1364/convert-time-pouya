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
        ->add('marsDate', TextType::class, [
            'label'=>'Date on Earth in UTC ',
            'help' => 'Date is a string with this format: YYY-MM-DD',
            'required'=>true,
        ])
        ->add('marsTime', TextType::class, [
            'label'=>'Time on Earth in UTC ',
            'help' => 'Time is a string with this format: H24:MM:SS',
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

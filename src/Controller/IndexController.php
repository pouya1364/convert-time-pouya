<?php
namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(): Response
    {
        $form = $this->createFormBuilder()
        ->setMethod('POST')
        ->setAction('app/convert')
        ->add('invoiceDate', DateTimeType::class, [
            'label'=>'Select a time',
            'widget'=>'single_text',
            'required'=>true,
        ])
        ->add('Convert', SubmitType::class, [
            'validation_groups' => false,
        ])
        ->getForm()
        ;
        return $this->render('home.html.twig', ['form'=>$form->createView()]);
    }
}

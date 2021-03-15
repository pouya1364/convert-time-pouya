<?php
namespace App\Controller;

use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Render index page 
 */
class IndexController extends AbstractController
{
    /**
     * Build a form in index to submit convert requests
     *
     * @return object
     */
    protected function buildForm() : object
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

        ->getForm();

        return $form;
    }

    /**
     * Render index page
     *
     * @return Response
     */
    public function index(): Response
    {
        $form =  $this->buildForm();
        return $this->render('home/home.html.twig', ['form'=>$form->createView()]);
    }
}

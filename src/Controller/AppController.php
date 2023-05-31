<?php
namespace App\Controller;

use App\Entity\Card;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/salut', name: 'app')]
    public function new(Request $request): Response
    {
       // $product = 'test';
        $product = new Card();
        $form = $this->createForm(ProductType::class, $product);

        return $this->render('product/new.html.twig',
        [
            'form' => $form
        ]);
    }
}
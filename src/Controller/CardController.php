<?php
// src/Controller/CardController.php
namespace App\Controller;

use App\Entity\Card;
use App\Form\ProductType;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class CardController extends AbstractController
{
    #[Route('/product/new', name: 'app_product_new')]
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $product = new Card();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $brochureFile */
            $brochureFile = $form->get('brochure')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($brochureFile) {
                $brochureFileName = $fileUploader->upload($brochureFile);
                $product->setBrochureFilename($brochureFileName);
            }

            // ... persist the $product variable or any other work

            return $this->redirectToRoute('app');
        }

        return $this->render('product/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
<?php

namespace App\Controller\Admin;

use App\Entity\Thumbnail;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ThumbnailCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Thumbnail::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('imageName')->setBasePath('/uploads/images/cards')->onlyOnIndex(),
        ];
    }

}

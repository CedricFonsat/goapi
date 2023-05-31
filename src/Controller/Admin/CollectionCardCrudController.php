<?php

namespace App\Controller\Admin;

use App\Entity\CollectionCard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CollectionCardCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CollectionCard::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
          //  IdField::new('id'),
            TextField::new('name'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('imageName')->setBasePath('/uploads/images/cards')->onlyOnIndex(),
            AssociationField::new('category'),
            TextField::new('logo'),
            TextField::new('cover')->hideOnIndex(),
            TextField::new('image')->hideOnIndex(),
            TextEditorField::new('description'),
        ];
    }

}
